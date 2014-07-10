<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

class AdminManager extends AbstractEntityManager implements AdminManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function fetchAll(array $criteria = null)
    {
        $entityClass = 'PradoDigital\Rackspace\Apps\Entity\AdminList';

        return $this->client->get('admins', $entityClass);
    }

    /**
     * {@inheritDoc}
     */
    public function find(array $criteria)
    {
        $entityClass = 'PradoDigital\Rackspace\Apps\Entity\Admin';

        return $this->client->get(array('admins/{adminName}', array(
            'adminName' => $criteria['adminName']
        )), $entityClass);
    }
}
