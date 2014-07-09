<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

class MailboxManager extends AbstractEntityManager implements MailboxManagerInterface
{
    const URL_INDEX = 'domains/{domainName}/ex/mailboxes';
    const URL_SHOW = 'domains/{domainName}/ex/mailboxes/{mailboxName}';
    const URL_EMAIL_ADDRESS = 'domains/{domainName}/ex/mailboxes/{mailboxName}/emailaddresses/{emailAddress}';

    /**
     * {@inheritDoc}
     */
    public function fetchAll(array $criteria = NULL)
    {
        $entityClass = 'PradoDigital\\Rackspace\\Apps\\Entity\\MailboxList';
        return $this->client->get(array(self::URL_INDEX, array(
            'domainName' => $this->resolveDomainName($criteria)
        )), $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function find(array $criteria)
    {
        $entityClass = 'PradoDigital\\Rackspace\\Apps\\Entity\\Mailbox';
        return $this->client->get(array(self::URL_SHOW, array(
            'domainName' => $this->resolveDomainName($criteria),
            'mailboxName' => $this->resolveMailboxName($criteria)
        )), $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function create($entity)
    {
        throw new \BadMethodCallException('MailboxManager does not support the create method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function update($entity)
    {
        throw new \BadMethodCallException('MailboxManager does not support the update method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($entity)
    {
        throw new \BadMethodCallException('MailboxManager does not support the remove method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function addEmailAddress(array $criteria)
    {
        $this->client->post(array(self::URL_EMAIL_ADDRESS, array(
            'domainName' => $this->resolveDomainName($criteria),
            'mailboxName' => $this->resolveMailboxName($criteria),
            'emailAddress' => $this->resolveEmailAddress($criteria)
        )));

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function deleteEmailAddress(array $criteria)
    {
        $this->client->delete(array(self::URL_EMAIL_ADDRESS, array(
            'domainName' => $this->resolveDomainName($criteria),
            'mailboxName' => $this->resolveMailboxName($criteria),
            'emailAddress' => $this->resolveEmailAddress($criteria)
        )));

        return $this;
    }
}
