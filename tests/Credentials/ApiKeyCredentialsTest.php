<?php

namespace PradoDigital\Tests\Rackspace\Apps\Credentials;

use PradoDigital\Tests\Rackspace\Apps\TestCase;
use PradoDigital\Rackspace\Apps\Credentials\ApiKeyCredentials;
use PradoDigital\Rackspace\Apps\Credentials\CredentialsInterface;

class ApiKeyCredentialsTest extends TestCase
{
    const USER_KEY   = 'eGbq9/2hcZsRlr1JV1Pi';
    const SECRET_KEY = 'QHOvchm/40czXhJ1OxfxK7jDHr3t';

    /**
     * @var PradoDigital\Rackspace\Apps\Credentials\ApiKeyCredentials
     */
    private $credentials;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        $this->credentials = new ApiKeyCredentials(self::USER_KEY, self::SECRET_KEY);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->credentials = null;
    }

    public function testGetAuthHeadersWorks()
    {
        $timestamp = '20010308143725';
        $signature = 'eGbq9/2hcZsRlr1JV1Pi:20010308143725:yeLBFcUOdMgh9vVb499AeygEads=';

        $headers = $this->credentials->getAuthHeaders($timestamp);
        $this->assertEquals($signature, $headers['X-Api-Signature']);
        $this->assertEquals(CredentialsInterface::USER_AGENT, $headers['User-Agent']);
    }
}
