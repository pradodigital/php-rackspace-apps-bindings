<?php

namespace PradoDigital\Rackspace\Apps\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class DomainList extends AbstractEntityList
{
    protected $domains;

    public function __construct()
    {
        $this->domains = array();
    }

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null)
    {
        if (isset($data['domains'])) {
            foreach ($data['domains'] as $value) {
                $domain = $denormalizer->denormalize($value, __NAMESPACE__ . '\\' . 'Domain');
                $this->addDomain($domain);
            }
            unset($data['domains']);
        }

        return parent::denormalize($denormalizer, $data, $format);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->getDomains());
    }

    public function getDomains()
    {
        return $this->domains;
    }

    public function addDomain(Domain $domain)
    {
        $this->domains[] = $domain;
        return $this;
    }
}
