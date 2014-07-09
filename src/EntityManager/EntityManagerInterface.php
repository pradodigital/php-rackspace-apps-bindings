<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

interface EntityManagerInterface
{
    function fetchAll(array $criteria = NULL);

    function find(array $criteria);

    function create($entity);

    function remove($entity);

    function update($entity);
}
