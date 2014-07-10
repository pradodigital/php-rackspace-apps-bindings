<?php

namespace PradoDigital\Tests\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\EntityManager\CustomerManager;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Message\MessageFactory;

class CustomerManagerTest extends EntityManagerTestCase
{
    private $em;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->em = new CustomerManager($this->client);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em = null;
    }

    public function testCreateLoginToken()
    {
        $body = <<<BODY
{"dateCreated":"7\/26\/2012 4:52:29 PM","token":"EEB0012D8DBC2CAC26E28365D44B537FFF0D79350","user":"username"}
BODY;

        $this->httpMock->addResponse($this->messageFactory->createResponse(200, array(), $body));

        $username = 'username';
        $loginToken = $this->em->createLoginToken($username);
        $this->assertInstanceOf('PradoDigital\Rackspace\Apps\Entity\LoginToken', $loginToken);
        $this->assertEquals($username, $loginToken->getUser());
        $this->assertEquals('EEB0012D8DBC2CAC26E28365D44B537FFF0D79350', $loginToken->getToken());
    }
}
