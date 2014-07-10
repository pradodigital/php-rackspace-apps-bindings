<?php

namespace PradoDigital\Rackspace\Apps\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class AdminList extends AbstractEntityList
{
    private $admins;

    public function __construct()
    {
        $this->admins = array();
    }

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        if (isset($data['admins'])) {
            foreach ($data['admins'] as $value) {
                $admin = $denormalizer->denormalize($value, __NAMESPACE__ . '\\' . 'Admin');
                $this->addAdmin($admin);
            }
            unset($data['admins']);
        }

        return parent::denormalize($denormalizer, $data, $format);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->getAdmins());
    }

    public function getAdmins()
    {
        return $this->admins;
    }

    public function addAdmin(Admin $admin)
    {
        $this->admins[] = $admin;
        return $this;
    }
}
