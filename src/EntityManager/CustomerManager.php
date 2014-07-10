<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

class CustomerManager extends AbstractEntityManager implements CustomerManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function createLoginToken($userName, $isVirtualUser = false)
    {
        $tokenClass = 'PradoDigital\Rackspace\Apps\Entity\LoginToken';
        return $this->client->post('loginToken', $tokenClass, array(
            'userName' => $userName,
            'virtualUser' => $isVirtualUser ? 'true' : 'false'
        ));
    }
}
