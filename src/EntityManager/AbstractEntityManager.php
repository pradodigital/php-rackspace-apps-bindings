<?php

namespace PradoDigital\Rackspace\Apps\EntityManager;

use PradoDigital\Rackspace\Apps\Http\ClientAdapterInterface;

abstract class AbstractEntityManager
{
    /**
     * @var ClientAdapterInterface
     */
    protected $client;

    /**
     * Constructor.
     *
     * @param ClientAdapterInterface $client
     */
    public function __construct(ClientAdapterInterface $client)
    {
        $this->setClient($client);
    }

    /**
     * Returns the HTTP client adapter.
     *
     * @return ClientAdapterInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sets the HTTP client adapter.
     *
     * @param ClientAdapterInterface $client
     * @return \PradoDigital\Rackspace\Common\AbstractEntityManager
     */
    public function setClient(ClientAdapterInterface $client)
    {
        $this->client = $client;
        return $this;
    }
}
