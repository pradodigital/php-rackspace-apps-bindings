<?php

namespace PradoDigital\Tests\Rackspace\Apps\Entity;

use PradoDigital\Tests\Rackspace\Apps\TestCase;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;

class EntityTestCase extends TestCase
{
    protected $serializer;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        $this->serializer = new Serializer(
            array(new CustomNormalizer()),
            array(new JsonEncoder())
        );
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->serializer = null;
    }
}
