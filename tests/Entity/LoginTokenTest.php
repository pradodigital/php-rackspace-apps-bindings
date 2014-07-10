<?php

namespace PradoDigital\Tests\Rackspace\Apps\Entity;

use PradoDigital\Rackspace\Apps\Entity\LoginToken;

class LoginTokenTest extends EntityTestCase
{
    /**
     * @var PradoDigital\Rackspace\Apps\Entity\LoginToken
     */
    private $entity;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $this->entity = new LoginToken();

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
        $json = '{"dateCreated":"7\/26\/2012 4:52:29 PM","token":"EEB0012D8DBC2CAC26E28365D44B537FFF0D79350","user":"username"}';
        $data = $this->serializer->decode($json, 'json');
        $this->entity->denormalize($this->serializer, $data, 'json');

        $this->assertEquals(new \DateTime('7/26/2012 4:52:29 PM'), $this->entity->getDateCreated());
        $this->assertSame('EEB0012D8DBC2CAC26E28365D44B537FFF0D79350', $this->entity->getToken());
        $this->assertSame('username', $this->entity->getUser());
    }

    public function testGetTokenLoginUrl()
    {
        $json = '{"dateCreated":"7\/26\/2012 4:52:29 PM","token":"EEB0012D8DBC2CAC26E28365D44B537FFF0D79350","user":"username"}';
        $data = $this->serializer->decode($json, 'json');
        $this->entity->denormalize($this->serializer, $data, 'json');

        $expected = 'http://cp.rackspace.com/TokenLogin.aspx?loginToken=EEB0012D8DBC2CAC26E28365D44B537FFF0D79350';
        $actual = $this->entity->getTokenLoginUrl();
        $this->assertEquals($expected, $actual);
    }

    public function testIsValidWhenValid()
    {
        $dt = new \DateTime();
        $this->entity->setDateCreated($dt);
        $this->assertTrue($this->entity->isValid());

        $dt = new \DateTime();
        $dt->sub(new \DateInterval('PT9M59S'));
        $this->entity->setDateCreated($dt);
        $this->assertTrue($this->entity->isValid());
    }

    public function testIsValidWhenInvalid()
    {
        $dt = new \DateTime();
        $dt->sub(new \DateInterval('PT10M'));
        $this->entity->setDateCreated($dt);
        $this->assertFalse($this->entity->isValid());

        $dt = new \DateTime();
        $dt->sub(new \DateInterval('PT10M1S'));
        $this->entity->setDateCreated($dt);
        $this->assertFalse($this->entity->isValid());
    }
}
