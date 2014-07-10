<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\Entity\Domain;

class DomainManager extends AbstractEntityManager implements DomainManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function fetchAll(array $criteria = null)
    {
        $entityClass = 'PradoDigital\Rackspace\Apps\Entity\DomainList';

        return $this->client->get('domains', $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function find(array $criteria)
    {
        $entityClass = 'PradoDigital\Rackspace\Apps\Entity\Domain';

        return $this->client->get(array('domains/{domainName}', array(
            'domainName' => $criteria['domainName']
        )), $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function getCatchAllAddress(Domain $domain)
    {
        $response = $this->client->get(array('domains/{domainName}/catchalladdress', array(
            'domainName' => $domain->getName()
        )));

        return json_decode($response, true);
    }

    /**
     * {@inheritDoc}
     */
    public function getArchivingSsoLoginUrl(Domain $domain)
    {
        $response = $this->client->get(array('domains/{domainName}/archivingSSOLoginURL', array(
            'domainName' => $domain->getName()
        )));

        return json_decode($response, true);
    }
}
