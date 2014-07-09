<?php

namespace PradoDigital\Rackspace\Apps\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

abstract class AbstractEntity
{
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = NULL)
    {
        foreach ($data as $attribute => $value) {
            $setter = 'set' . $attribute;
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }

        return $this;
    }
}
