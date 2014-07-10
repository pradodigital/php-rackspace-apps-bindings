<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\Entity\Domain;

interface DomainManagerInterface
{
    public function fetchAll(array $criteria = null);

    public function find(array $criteria);

    public function getCatchAllAddress(Domain $domain);

    public function getArchivingSsoLoginUrl(Domain $domain);
}
