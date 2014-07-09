<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

interface MailboxManagerInterface extends EntityManagerInterface
{
    function addEmailAddress(array $criteria);

    function deleteEmailAddress(array $criteria);
}
