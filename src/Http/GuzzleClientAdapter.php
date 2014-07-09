<?php

namespace PradoDigital\Rackspace\Apps\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;

class GuzzleClientAdapter implements ClientAdapterInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * Constructor.
     *
     * @param ClientInterface $client The Guzzle HTTP client to use.
     */
    public function __construct(ClientInterface $client)
    {
        $this->setClient($client);
        $this->serializer = new Serializer(
            array(new CustomNormalizer()),
            array('json' => new JsonEncoder())
        );
    }

    /**
     * Sets the internal Guzzle HTTP client to make requests with.
     *
     * @param ClientInterface $client
     * @return \Cowlby\Rackspace\Common\Http\ClientAdapterInterface
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function get($uri, $entityClass = NULL, $body = NULL)
    {
        $request = $this->client->get($uri, NULL, $body);
        return $this->send($request, $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function post($uri, $entityClass = NULL, $body = NULL)
    {
        $request = $this->client->post($uri, NULL, $body);
        return $this->send($request, $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function put($uri, $entityClass = NULL, $body = NULL)
    {
        $request = $this->client->put($uri, NULL, $body);
        return $this->send($request, $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function delete($uri, $entityClass = NULL, $body = NULL)
    {
        $request = $this->client->delete($uri, NULL, $body);
        return $this->send($request, $entityClass);
    }

    /**
     * Sends the passed Request and returns the response or a hydrated object.
     *
     * @param RequestInterface $request The Request to send.
     * @param string $entityClass Optional entity class to hydrate.
     * @return mixed The response or a hydrated object.
     */
    protected function send(RequestInterface $request, $entityClass = NULL)
    {
        $response = $this->client->send($request);

        $retVal = $response->getBody();

        if ($entityClass !== NULL) {
            $retVal = $this->serializer->deserialize($retVal, $entityClass, 'json');
        }

        return $retVal;
    }
}
