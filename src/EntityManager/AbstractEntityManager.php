<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\Entity;
use PradoDigital\Rackspace\Apps\Http\ClientAdapterInterface;

abstract class AbstractEntityManager
{
    /**
     * @var ClientAdapterInterface
     */
    protected $client;

    /**
     * Constructor.
     *
     * @param ClientAdapterInterface $client
     */
    public function __construct(ClientAdapterInterface $client)
    {
        $this->setClient($client);
    }

    /**
     * Returns the HTTP client adapter.
     *
     * @return ClientAdapterInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sets the HTTP client adapter.
     *
     * @param ClientAdapterInterface $client
     * @return \PradoDigital\Rackspace\Common\AbstractEntityManager
     */
    public function setClient(ClientAdapterInterface $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Resolves the domain name from a string, an array, or an object.
     *
     * @param mixed $domain The object to resolve.
     * @return string
     */
    protected function resolveDomainName($domain)
    {
        if ($domain instanceof Entity\Domain) {
            $domain = $domain->getName();
        } else if (is_array($domain)) {
            $domain = $domain['domainName'];
        }

        return $domain;
    }

    /**
     * Resolves the mailbox name from a string, an array, or an object.
     *
     * @param mixed $mailbox The object to resolve.
     * @return string
     */
    protected function resolveMailboxName($mailbox)
    {
        if ($mailbox instanceof Entity\Mailbox) {
            $mailbox = $mailbox->getName();
        } else if (is_array($mailbox)) {
            $mailbox = $mailbox['mailboxName'];
        }

        return $mailbox;
    }

    /**
     * Resolves the email address from a string or an array.
     *
     * @param mixed $emailAddress The object to resolve.
     * @return string
     */
    protected function resolveEmailAddress($emailAddress)
    {
        if (is_array($emailAddress)) {
            $emailAddress = $emailAddress['emailAddress'];
        }

        return $emailAddress;
    }
}
