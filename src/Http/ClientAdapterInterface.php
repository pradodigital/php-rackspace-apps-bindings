<?php

namespace PradoDigital\Rackspace\Apps\Http;

interface ClientAdapterInterface
{
    /**
     * Perform a GET request to the specified relative uri with the given body
     * and return a hydrated entity.
     *
     * @param string $uri The relative uri to GET.
     * @param string $entityClass Optional entity class to hydrate.
     * @param mixed $body Optional message body.
     * @return mixed The response or a hydrated object.
     */
    public function get($uri, $entityClass = NULL, $body = NULL);

    /**
     * Perform a POST request to the specified relative uri with the given body
     * and return a hydrated entity.
     *
     * @param string $uri The relative uri to POST.
     * @param string $entityClass Optional entity class to hydrate.
     * @param mixed $body Optional message body.
     * @return mixed The response or a hydrated object.
     */
    public function post($uri, $entityClass = NULL, $body = NULL);

    /**
     * Perform a PUT request to the specified relative uri with the given body
     * and return a hydrated entity.
     *
     * @param string $uri The relative uri to PUT.
     * @param string $entityClass Optional entity class to hydrate.
     * @param mixed $body Optional message body.
     * @return mixed The response or a hydrated object.
     */
    public function put($uri, $entityClass = NULL, $body = NULL);

    /**
     * Perform a DELETE request to the specified relative uri with the given
     * body and return a hydrated entity.
     *
     * @param string $uri The relative uri to DELETE.
     * @param string $entityClass Optional entity class to hydrate.
     * @param mixed $body Optional message body.
     * @return mixed The response or a hydrated object.
     */
    public function delete($uri, $entityClass = NULL, $body = NULL);
}
