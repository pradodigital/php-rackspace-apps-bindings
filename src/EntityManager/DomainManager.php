<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

class DomainManager extends AbstractEntityManager implements DomainManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function fetchAll(array $criteria = NULL)
    {
        $entityClass = 'PradoDigital\\Rackspace\\Apps\\Entity\\DomainList';
        return $this->client->get('domains', $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function find(array $criteria)
    {
        $entityClass = 'PradoDigital\\Rackspace\\Apps\\Entity\\Domain';
        return $this->client->get(array('domains/{domainName}', array(
            'domainName' => $this->resolveDomainName($criteria)
        )), $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function create($entity)
    {
        throw new \BadMethodCallException('DomainManager does not support the create method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function update($entity)
    {
        throw new \BadMethodCallException('DomainManager does not support the update method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($entity)
    {
        throw new \BadMethodCallException('DomainManager does not support the remove method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function getArchivingSsoLoginUrl($domain)
    {
        $response = $this->client->get(array('domains/{domainName}/archivingSSOLoginURL', array(
            'domainName' => $this->resolveDomainName($domain)
        )));

        return json_decode($response, TRUE);
    }
}
