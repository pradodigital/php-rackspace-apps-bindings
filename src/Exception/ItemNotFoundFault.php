<?php

namespace PradoDigital\Rackspace\Apps\Exception;

class ItemNotFoundFault extends AppsFault
{
    public $resourceType;

    public function getResourceType()
    {
        return $this->resourceType;
    }

    public function setResourceType($resourceType)
    {
        $this->resourceType = $resourceType;
        return $this;
    }
}
