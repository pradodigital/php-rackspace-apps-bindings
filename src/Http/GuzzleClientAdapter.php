<?php

namespace PradoDigital\Rackspace\Apps\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Message\RequestInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

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
    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->setClient($client);
        $this->setSerializer($serializer);

        $this->serializer = new Serializer(
            array(new CustomNormalizer()),
            array('json' => new JsonEncoder())
        );
    }

    /**
     * Sets the internal Guzzle HTTP client to make requests with.
     *
     * @param ClientInterface $client
     * @return \PradoDigital\Rackspace\Apps\Http\ClientAdapterInterface
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Sets the internal serializer.
     *
     * @param SerializerInterface $serializer
     * @return \PradoDigital\Rackspace\Apps\Http\ClientAdapterInterface
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function get($uri, $entityClass = null, $body = null)
    {
        $request = $this->client->createRequest('get', $uri, array('body' => $body));
        return $this->send($request, $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function post($uri, $entityClass = null, $body = null)
    {
        $request = $this->client->createRequest('post', $uri, array(
            'body' => $body,
            'headers' => $body === null ? array('Content-Length' => 0) : array()
        ));

        return $this->send($request, $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function put($uri, $entityClass = null, $body = null)
    {
        $request = $this->client->createRequest('put', $uri, array('body' => $body));
        return $this->send($request, $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function delete($uri, $entityClass = null, $body = null)
    {
        $request = $this->client->createRequest('delete', $uri, array('body' => $body));
        return $this->send($request, $entityClass);
    }

    /**
     * Sends the passed Request and returns the response or a hydrated object.
     *
     * @param RequestInterface $request The Request to send.
     * @param string $entityClass Optional entity class to hydrate.
     * @return mixed The response or a hydrated object.
     */
    protected function send(RequestInterface $request, $entityClass = null)
    {
        $response = $this->client->send($request);

        $retVal = $response->getBody();

        if ($entityClass !== null) {
            $retVal = $this->serializer->deserialize($retVal, $entityClass, 'json');
        }

        return $retVal;
    }
}
