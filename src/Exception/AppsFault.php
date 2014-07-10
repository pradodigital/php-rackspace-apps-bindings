<?php

namespace PradoDigital\Rackspace\Apps\Exception;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizableInterface;

class AppsFault extends \RuntimeException implements Exception, DenormalizableInterface
{
    public $details;

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        foreach ($data as $attribute => $value) {
            $this->set($attribute, $value);
        }

        return $this;
    }

    private function set($attribute, $value)
    {
        $setter = 'set' . $attribute;
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        }

        return $this;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }
}
