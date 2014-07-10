<?php

namespace PradoDigital\Rackspace\Apps\Credentials;

use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\BeforeEvent;

class GuzzleAuthenticationSubscriber implements SubscriberInterface
{
    private $credentials;

    public function __construct(CredentialsInterface $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getEvents()
    {
        return ['before' => ['sign', RequestEvents::SIGN_REQUEST]];
    }

    public function sign(BeforeEvent $event)
    {
        $request = $event->getRequest();
        $headers = array_merge($request->getHeaders(), $this->credentials->getAuthHeaders());
        $event->getRequest()->setHeaders($headers);
    }
}
