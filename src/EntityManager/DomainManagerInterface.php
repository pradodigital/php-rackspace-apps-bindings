<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

interface DomainManagerInterface extends EntityManagerInterface
{
    function getArchivingSsoLoginUrl($domain);
}
