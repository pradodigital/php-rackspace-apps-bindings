<?php

namespace PradoDigital\Tests\Rackspace\Apps;

use PradoDigital\Rackspace\Apps\ServiceContainer;

class ServiceContainerTest extends TestCase
{
    private $container;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        $credentials = $this->getMock('PradoDigital\Rackspace\Apps\Credentials\CredentialsInterface');
        $client = $this->getMock('PradoDigital\Rackspace\Apps\Http\ClientAdapterInterface');

        $this->container = new ServiceContainer($credentials);
        $this->container['http.client'] = function ($container) use ($client) {
            return $client;
        };
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->container = null;
    }

    public function testGetCustomerManager()
    {
        $expected = 'PradoDigital\Rackspace\Apps\EntityManager\CustomerManagerInterface';
        $actual = $this->container->getCustomerManager();

        $this->assertInstanceOf($expected, $actual);
    }

    public function testGetAdminManager()
    {
        $expected = 'PradoDigital\Rackspace\Apps\EntityManager\AdminManagerInterface';
        $actual = $this->container->getAdminManager();

        $this->assertInstanceOf($expected, $actual);
    }

    public function testGetDomainManager()
    {
        $expected = 'PradoDigital\Rackspace\Apps\EntityManager\DomainManagerInterface';
        $actual = $this->container->getDomainManager();

        $this->assertInstanceOf($expected, $actual);
    }

    public function testGetMailboxManager()
    {
        $expected = 'PradoDigital\Rackspace\Apps\EntityManager\MailboxManagerInterface';
        $actual = $this->container->getMailboxManager();

        $this->assertInstanceOf($expected, $actual);
    }
}
