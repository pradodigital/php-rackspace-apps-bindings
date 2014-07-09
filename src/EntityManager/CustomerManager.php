<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

class CustomerManager extends AbstractEntityManager implements CustomerManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function fetchAll(array $criteria = NULL)
    {
        throw new \BadMethodCallException('CustomerManager does not support the fetchAll method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function find(array $criteria)
    {
        throw new \BadMethodCallException('CustomerManager does not support the find method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function create($entity)
    {
        throw new \BadMethodCallException('CustomerManager does not support the create method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function update($entity)
    {
        throw new \BadMethodCallException('CustomerManager does not support the update method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($entity)
    {
        throw new \BadMethodCallException('CustomerManager does not support the remove method.', 0);
    }

    /**
     * {@inheritDoc}
     */
    public function createLoginToken($userName, $isVirtualUser = FALSE)
    {
        $tokenClass = 'PradoDigital\\Rackspace\\Apps\\Entity\\LoginToken';
        return $this->client->post('loginToken', $tokenClass, array(
            'userName' => $userName,
            'virtualUser' => $isVirtualUser ? 'true' : 'false'
        ));
    }
}
