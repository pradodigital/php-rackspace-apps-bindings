<?php

namespace PradoDigital\Tests\Rackspace\Apps\EntityManager;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Mock;
use PradoDigital\Tests\Rackspace\Apps\TestCase;
use PradoDigital\Rackspace\Apps\Http\GuzzleClientAdapter;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use GuzzleHttp\Message\MessageFactory;

class EntityManagerTestCase extends TestCase
{
    protected $client;

    protected $serializer;

    protected $messageFactory;

    protected $httpMock;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        $this->serializer = new Serializer(
            array(new CustomNormalizer()),
            array(new JsonEncoder())
        );

        $this->messageFactory = new MessageFactory();

        $guzzle = new Client();
        $this->httpMock = new Mock();
        $guzzle->getEmitter()->attach($this->httpMock);
        $this->client = new GuzzleClientAdapter($guzzle, $this->serializer);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->client = null;
        $this->httpMock = null;
        $this->serializer = null;
        $this->messageFactory = null;
    }
}
