<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

interface CustomerManagerInterface extends EntityManagerInterface
{
    /**
     * Creates a LoginToken entity.
     *
     * @param string $username The username to create token for.
     * @param bool $isVirtualUser Whether or not the user is virtual. (Defaults to FALSE).
     * @return \Cowlby\Rackspace\Apps\Entity\LoginToken
     */
    function createLoginToken($username, $isVirtualUser = FALSE);
}
