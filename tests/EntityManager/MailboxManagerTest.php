<?php

namespace PradoDigital\Tests\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\EntityManager\MailboxManager;
use GuzzleHttp\Message\Response;

class MailboxManagerTest extends EntityManagerTestCase
{
    private $em;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->em = new MailboxManager($this->client);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em = null;
    }

    public function testAddEmailAddress()
    {
        $this->httpMock->addResponse($this->messageFactory->createResponse(200, array(), ''));

        $em = $this->em->addEmailAddress(array(
            'domainName' => 'example.com',
            'mailboxName' => 'test',
            'emailAddress' => 'alias@example.com'
        ));

        $this->assertSame($em, $this->em);
    }

    public function testDeleteEmailAddress()
    {
        $this->httpMock->addResponse($this->messageFactory->createResponse(200, array(), ''));

        $em = $this->em->deleteEmailAddress(array(
            'domainName' => 'example.com',
            'mailboxName' => 'test',
            'emailAddress' => 'alias@example.com'
        ));

        $this->assertSame($em, $this->em);
    }
}
