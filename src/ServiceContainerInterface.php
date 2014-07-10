<?php

namespace PradoDigital\Rackspace\Apps;

interface ServiceContainerInterface
{
    /**
     * Get a shared CustomerManager instance.
     *
     * @return \PradoDigital\Rackspace\Apps\EntityManager\CustomerManagerInterface
     */
    public function getCustomerManager();

    /**
     * Get a shared AdminManager instance.
     *
     * @return \PradoDigital\Rackspace\Apps\EntityManager\AdminManagerInterface
     */
    public function getAdminManager();

    /**
     * Get a shared DomainManager instance.
     *
     * @return \PradoDigital\Rackspace\Apps\EntityManager\DomainManagerInterface
     */
    public function getDomainManager();

    /**
     * Get a shared MailboxManager instance.
     *
     * @return \PradoDigital\Rackspace\Apps\EntityManager\MailboxManagerInterface
     */
    public function getMailboxManager();
}
