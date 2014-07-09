<?php

namespace PradoDigital\Rackspace\Apps;

use Pimple\Container;
use GuzzleHttp\Client;
use PradoDigital\Rackspace\Apps\EntityManager;
use PradoDigital\Rackspace\Apps\Credentials\CredentialsInterface;
use PradoDigital\Rackspace\Apps\Http\GuzzleClientAdapter;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use Symfony\Component\Serializer\Serializer;
use GuzzleHttp\Event\ErrorEvent;

class ServiceContainer extends Container implements ServiceContainerInterface
{
    const RACKSPACE_API_ENDPOINT = 'http://api.emailsrvr.com/';
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

        $this['endpoint'] = self::RACKSPACE_API_ENDPOINT;

        $this['guzzle'] = function($container) {

            $baseUrl = $container['endpoint'] . '/{version}/customers/{customerAccountNumber}';
            $client = new Client($baseUrl, array(
                'version' => self::RACKSPACE_API_VERSION,
                'customerAccountNumber' => 'me'
            ));

            $client->setDefaultHeaders(array_merge(array(
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ), $container['credentials']->getAuthHeaders()));

            $client->getEmitter()->on('error', function (ErrorEvent $event) use ($container) {

                $json = $container['serializer']->decode($event['response']->getBody(), 'json');

                if (count($json) === 1) {

                    $apiFault = key($json);
                    $faultClass = 'PradoDigital\\Rackspace\\Apps\\Exception\\';
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
        };

        $this['http.client'] = function($container) {
            return new GuzzleClientAdapter($container['guzzle']);
        };

        $this['customer_manager'] = function($container) {
            return new EntityManager\CustomerManager($container['http.client']);
        };

        $this['domain_manager'] = function($container) {
            return new EntityManager\DomainManager($container['http.client']);
        };

        $this['mailbox_manager'] = function($container) {
            return new EntityManager\MailboxManager($container['http.client']);
        };
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
