<?php

namespace PradoDigital\Rackspace\Apps;

use Pimple as Container;
use GuzzleHttp\Client;
use PradoDigital\Rackspace\Apps\EntityManager;
use PradoDigital\Rackspace\Apps\Credentials\CredentialsInterface;
use PradoDigital\Rackspace\Apps\Http\GuzzleClientAdapter;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use Symfony\Component\Serializer\Serializer;
use GuzzleHttp\Event\ErrorEvent;
use PradoDigital\Rackspace\Apps\Credentials\GuzzleAuthenticationSubscriber;

class ServiceContainer extends Container implements ServiceContainerInterface
{
    const RACKSPACE_API_ENDPOINT = 'https://api.emailsrvr.com';
    const RACKSPACE_API_VERSION = 'v1';

    /**
     * Constructor.
     *
     * Instantiates and sets up various services to interact with the
     * Cloud Identity API.
     */
    public function __construct(CredentialsInterface $credentials)
    {
        $this['credentials'] = $credentials;
        $this['api.endpoint'] = self::RACKSPACE_API_ENDPOINT;
        $this['api.version'] = self::RACKSPACE_API_VERSION;

        // Create Serializer definitions.
        $this['serializer.normalizers'] = $this->share(function ($container) {
            return array(new CustomNormalizer());
        });

        $this['serializer.encoders'] = $this->share(function ($container) {
            return array(new JsonEncoder());
        });

        $this['serializer'] = $this->share(function ($container) {
            return new Serializer($container['serializer.normalizers'], $container['serializer.encoders']);
        });

        // Create HTTP Client definitions.
        $this['guzzle'] = $this->share(function ($container) {

            $client = new Client(array(
                'base_url' => array(
                    $container['api.endpoint'] . '/{version}/customers/{customerAccountNumber}/',
                    array(
                        'version' => $container['api.version'],
                        'customerAccountNumber' => 'me'
                    )
                ),
                'defaults' => array(
                    'headers' => array(
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/x-www-form-urlencoded'
                    )
                )
            ));

            $client->getEmitter()->attach(new GuzzleAuthenticationSubscriber($container['credentials']));

            $client->getEmitter()->on('error', function (ErrorEvent $event) use ($container) {

                $json = $container['serializer']->decode($event->getResponse()->getBody(), 'json');

                if (count($json) === 1) {

                    $apiFault = key($json);
                    $faultClass = 'PradoDigital\Rackspace\Apps\Exception\\';
                    $faults = array(
                        'unauthorizedFault' => 'UnauthorizedFault',
                        'itemNotFoundFault' => 'ItemNotFoundFault',
                        'badRequestFault' => 'BadRequestFault'
                    );

                    $faultClass .= isset($faults[$apiFault]) ? $faults[$apiFault] : 'AppsFault';
                    $fault = $container['serializer']->denormalize(current($json), $faultClass, 'json');

                    throw $fault;
                }
            });

            return $client;
        });

        $this['http.client'] = $this->share(function ($container) {
            return new GuzzleClientAdapter($container['guzzle'], $container['serializer']);
        });

        // Create Entity Manager definitions.
        $this['customer_manager'] = $this->share(function ($container) {
            return new EntityManager\CustomerManager($container['http.client']);
        });

        $this['admin_manager'] = $this->share(function ($container) {
            return new EntityManager\AdminManager($container['http.client']);
        });

        $this['domain_manager'] = $this->share(function ($container) {
            return new EntityManager\DomainManager($container['http.client']);
        });

        $this['mailbox_manager'] = $this->share(function ($container) {
            return new EntityManager\MailboxManager($container['http.client']);
        });
    }

    /**
     * {@inheritDoc}
     * @return \PradoDigital\Rackspace\Apps\EntityManager\CustomerManagerInterface
     */
    public function getCustomerManager()
    {
        return $this['customer_manager'];
    }

    /**
     * {@inheritDoc}
     * @return \PradoDigital\Rackspace\Apps\EntityManager\AdminManagerInterface
     */
    public function getAdminManager()
    {
        return $this['admin_manager'];
    }

    /**
     * {@inheritDoc}
     * @return \PradoDigital\Rackspace\Apps\EntityManager\DomainManagerInterface
     */
    public function getDomainManager()
    {
        return $this['domain_manager'];
    }

    /**
     * {@inheritDoc}
     * @return \PradoDigital\Rackspace\Apps\EntityManager\MailboxManagerInterface
     */
    public function getMailboxManager()
    {
        return $this['mailbox_manager'];
    }
}
