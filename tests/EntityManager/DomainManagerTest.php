<?php

namespace PradoDigital\Tests\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\Entity\Domain;
use PradoDigital\Rackspace\Apps\EntityManager\DomainManager;
use GuzzleHttp\Message\Response;

class DomainManagerTest extends EntityManagerTestCase
{
    private $em;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->em = new DomainManager($this->client);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em = NULL;
    }

    public function testFetchAll()
    {
        $body = <<<BODY
{"domains":[{"accountNumber":"123456","name":"example.com","serviceType":"exchange"}],"offset":0,"size":50,"total":1}
BODY;

        $this->httpMock->addResponse($this->messageFactory->createResponse(200, array(), $body));

        $domainList = $this->em->fetchAll();

        $this->assertInstanceOf('PradoDigital\Rackspace\Apps\Entity\DomainList', $domainList);
        $this->assertSame(50, $domainList->getSize());
        $this->assertSame(0, $domainList->getOffset());
        $this->assertSame(1, $domainList->getTotal());

        $domains = $domainList->getDomains();
        $this->assertInstanceOf('PradoDigital\Rackspace\Apps\Entity\Domain', $domains[0]);
        $this->assertEquals('example.com', $domains[0]->getName());
    }

    public function testFind()
    {
        $body = <<<BODY
{"accountNumber":"123456","activeSyncLicenses":1,"activeSyncMobileServiceEnabled":true,"aliases":["example.net"],"archivingServiceEnabled":true,"blackBerryLicenses":null,"blackBerryMobileServiceEnabled":false,"exchangeBaseMailboxSize":2048,"exchangeExtraStorage":0,"exchangeMaxNumMailboxes":1,"exchangeTotalStorage":2048,"exchangeUsedStorage":1,"name":"example.com","publicFoldersEnabled":false,"rsEmailBaseMailboxSize":0,"rsEmailExtraStorage":0,"rsEmailMaxNumberMailboxes":0,"rsEmailUsedStorage":0,"serviceType":"exchange"}
BODY;

        $this->httpMock->addResponse($this->messageFactory->createResponse(200, array(), $body));

        $domain = $this->em->find(array('domainName' => 'example.com'));
        $this->assertInstanceOf('PradoDigital\Rackspace\Apps\Entity\Domain', $domain);
        $this->assertEquals('example.com', $domain->getName());
    }

    public function testGetArchivingSsoUrl()
    {
        $body = <<<BODY
"https:\/\/examplecom.archivesrvr.com\/?token=oR2x7637FfnP4hRuZMqf"
BODY;

        $this->httpMock->addResponse($this->messageFactory->createResponse(200, array(), $body));

        $domain = new Domain();
        $domain->setName('example.com');
        $url = $this->em->getArchivingSsoLoginUrl($domain);
        $this->assertEquals('https://examplecom.archivesrvr.com/?token=oR2x7637FfnP4hRuZMqf', $url);
    }
}
