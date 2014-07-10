<?php

namespace PradoDigital\Tests\Rackspace\Apps\Entity;

use PradoDigital\Rackspace\Apps\Entity\DomainList;

class DomainListTest extends EntityTestCase
{
    /**
     * @var PradoDigital\Rackspace\Apps\Entity\DomainList
     */
    private $list;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $this->list = new DomainList();

        parent::setUp();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        $this->list = null;

        parent::tearDown();
    }

    public function testCountableInterface()
    {
        $this->list->setTotal(1);
        $this->assertSame(1, count($this->list));
    }

    public function testDenormalizer()
    {
        $json = '{"domains":[{"accountNumber":"123456","name":"example.com","serviceType":"exchange"}],"offset":0,"size":50,"total":1}';
        $data = $this->serializer->decode($json, 'json');
        $this->list->denormalize($this->serializer, $data, 'json');

        $this->assertEquals(0, $this->list->getOffset());
        $this->assertEquals(50, $this->list->getSize());
        $this->assertEquals(1, $this->list->getTotal());

        $domains = $this->list->getDomains();
        $this->assertSame(1, count($domains));
        $this->assertInstanceOf('PradoDigital\Rackspace\Apps\Entity\Domain', $domains[0]);

        // Test actual domains equals total reported. Brittle now since paging isn't implemented yet.
        $this->assertSame(count($domains), count($this->list));
    }
}
