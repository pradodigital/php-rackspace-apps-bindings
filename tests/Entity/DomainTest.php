<?php

namespace PradoDigital\Tests\Rackspace\Apps\Entity;

use PradoDigital\Rackspace\Apps\Entity\Domain;

class DomainTest extends EntityTestCase
{
    /**
     * @var PradoDigital\Rackspace\Apps\Entity\Domain
     */
    private $entity;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $this->entity = new Domain();

        parent::setUp();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        $this->entity = null;

        parent::tearDown();
    }

    public function testDenormalizer()
    {
        $json = '{"accountNumber":"123456","activeSyncLicenses":1,"activeSyncMobileServiceEnabled":true,"aliases":["example.net"],"archivingServiceEnabled":true,"blackBerryLicenses":null,"blackBerryMobileServiceEnabled":false,"exchangeBaseMailboxSize":2048,"exchangeExtraStorage":0,"exchangeMaxNumMailboxes":1,"exchangeTotalStorage":2048,"exchangeUsedStorage":1,"name":"example.com","publicFoldersEnabled":false,"rsEmailBaseMailboxSize":0,"rsEmailExtraStorage":0,"rsEmailMaxNumberMailboxes":0,"rsEmailUsedStorage":0,"serviceType":"exchange"}';
        $data = $this->serializer->decode($json, 'json');
        $this->entity->denormalize($this->serializer, $data, 'json');

        $this->assertSame('123456', $this->entity->getAccountNumber());
        $this->assertSame(1, $this->entity->getActiveSyncLicenses());
        $this->assertSame('example.com', $this->entity->getName());
        $this->assertSame('exchange', $this->entity->getServiceType());
        $this->assertTrue($this->entity->getActiveSyncMobileServiceEnabled());
        $this->assertEquals(array('example.net'), $this->entity->getAliases());
    }
}
