<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

interface AdminManagerInterface
{
    public function fetchAll(array $criteria = null);

    public function find(array $criteria);
}
