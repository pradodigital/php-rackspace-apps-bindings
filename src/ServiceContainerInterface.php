<?php

namespace PradoDigital\Rackspace\Apps;

use PradoDigital\Rackspace\Apps\Credentials\CredentialsInterface;

interface ServiceContainerInterface
{
    /**
     * @param \PradoDigital\Rackspace\Apps\Credentials\CredentialsInterface $credentials
     */
    function __construct(CredentialsInterface $credentials);

    /**
     * Get a shared CustomerManager instance.
     *
     * @return \PradoDigital\Rackspace\Apps\EntityManager\CustomerManagerInterface
     */
    function getCustomerManager();

    /**
     * Get a shared DomainManager instance.
     *
     * @return \PradoDigital\Rackspace\Apps\EntityManager\DomainManagerInterface
     */
    function getDomainManager();

    /**
     * Get a shared MailboxManager instance.
     *
     * @return \PradoDigital\Rackspace\Apps\EntityManager\MailboxManagerInterface
     */
    function getMailboxManager();
}
