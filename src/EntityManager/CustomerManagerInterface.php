<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

interface CustomerManagerInterface
{
    /**
     * Creates a LoginToken entity.
     *
     * @param string $username The username to create token for.
     * @param bool $isVirtualUser Whether or not the user is virtual. (Defaults to false).
     * @return \PradoDigital\Rackspace\Apps\Entity\LoginToken
     */
    public function createLoginToken($username, $isVirtualUser = false);
}
