<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\Exception\BadRequestFault;

class MailboxManager extends AbstractEntityManager implements MailboxManagerInterface
{
    const URL_INDEX = 'domains/{domainName}/ex/mailboxes';
    const URL_SHOW = 'domains/{domainName}/ex/mailboxes/{mailboxName}';
    const URL_EMAIL_ADDRESS = 'domains/{domainName}/ex/mailboxes/{mailboxName}/emailaddresses/{emailAddress}';

    /**
     * {@inheritDoc}
     */
    public function fetchAll(array $criteria = null)
    {
        if (!isset($criteria['domainName'])) {
            throw new BadRequestFault();
        }

        $entityClass = 'PradoDigital\Rackspace\Apps\Entity\MailboxList';
        return $this->client->get(array(self::URL_INDEX, $criteria), $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function find(array $criteria)
    {
        if (!isset($criteria['domainName']) || !isset($criteria['mailboxName'])) {
            throw new BadRequestFault();
        }

        $entityClass = 'PradoDigital\Rackspace\Apps\Entity\Mailbox';
        return $this->client->get(array(self::URL_SHOW, $criteria), $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function addEmailAddress(array $criteria)
    {
        if (!isset($criteria['domainName']) || !isset($criteria['mailboxName']) || !isset($criteria['emailAddress'])) {
            throw new BadRequestFault();
        }

        $this->client->post(array(self::URL_EMAIL_ADDRESS, $criteria));

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function deleteEmailAddress(array $criteria)
    {
        if (!isset($criteria['domainName']) || !isset($criteria['mailboxName']) || !isset($criteria['emailAddress'])) {
            throw new BadRequestFault();
        }

        $this->client->delete(array(self::URL_EMAIL_ADDRESS, $criteria));

        return $this;
    }
}
