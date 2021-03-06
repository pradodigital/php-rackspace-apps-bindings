<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

interface MailboxManagerInterface
{
    public function fetchAll(array $criteria = null);

    public function find(array $criteria);

    public function addEmailAddress(array $criteria);

    public function deleteEmailAddress(array $criteria);
}
