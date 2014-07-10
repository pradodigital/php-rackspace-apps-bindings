<?php

namespace PradoDigital\Rackspace\Apps\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class LoginToken extends AbstractEntity
{
    const URL_TOKEN_LOGIN = 'http://cp.rackspace.com/TokenLogin.aspx?loginToken={token}';

    private $id;

    private $user;

    private $token;

    private $dateCreated;

    private $expires;

    public function __construct()
    {
        $this->expires = new \DateTime();
    }

    public function getTokenLoginUrl()
    {
        return str_replace('{token}', $this->getToken(), self::URL_TOKEN_LOGIN);
    }

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        if (isset($data['dateCreated'])) {
            $data['dateCreated'] = new \DateTime($data['dateCreated']);
        }

        return parent::denormalize($denormalizer, $data, $format);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function setDateCreated(\DateTime $dateCreated)
    {
        $this->dateCreated = $dateCreated;
        $this->expires = clone $dateCreated;
        $this->expires->add(new \DateInterval('PT10M'));

        return $this;
    }

    public function isValid()
    {
        $now = new \DateTime();
        return $now < $this->expires;
    }
}
