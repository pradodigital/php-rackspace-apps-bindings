<?php

namespace PradoDigital\Rackspace\Apps\Credentials;

/**
 * Credentials interface to convert a set of credentials into a payload body.
 *
 * @author Jose Prado <cowlby@me.com>
 */
interface CredentialsInterface
{
    const USER_AGENT = 'Rackspace Apps Bindings/1.x (+https://github.com/pradodigital/php-rackspace-apps-bindings)';

    /**
     * Returns the api-ready headers to use for authentication.
     *
     * @param string $timestamp An optional timestamp to use in the request.
     * @return array The array of headers.
     */
    public function getAuthHeaders($timestamp = null);
}
