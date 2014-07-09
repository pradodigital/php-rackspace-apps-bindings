<?php
/**
 * @author    Jose Prado <cowlby@me.com>
 * @copyright Copyright (c) 2010 Jose Prado
 * @package   Cowlby\Rackspace\Apps
 * @version   $Id$
 */

namespace PradoDigital\Rackspace\Apps\Credentials;

/**
 * Class to handle the credentials generation.
 *
 * @author  Jose Prado <cowlby@me.com>
 * @package PradoDigital\Rackspace\Apps
 */
class ApiKeyCredentials implements CredentialsInterface
{
    /**
     * The API User Key.
     *
     * @var string
     */
    public $userKey;

    /**
     * The API Secret Key.
     *
     * @var string
     */
    public $secretKey;

    /**
     * Constructor.
     *
     * @param string $userKey The Rackspace Apps user key.
     * @param string $secretKey The matching Rackspace Apps secret key.
     * @param string $userAgent The user agent string to use.
     */
    public function __construct($userKey, $secretKey)
    {
        $this->userKey = $userKey;
        $this->secretKey = $secretKey;
    }

    /**
     * Creates and returns the necessary auth headers for a Rackspace Apps
     * request.
     *
     * @param string $timestamp An optional timestamp to use in the request.
     * @return array The array of headers.
     */
    public function getAuthHeaders($timestamp = null)
    {
        return array(
            'User-Agent' => CredentialsInterface::USER_AGENT,
            'X-Api-Signature' => $this->generateApiSignature($timestamp)
        );
    }

    /**
     * Creates and returns the X-Api-Signature according to
     * Rackspace Apps specs.
     *
     * @param string $timestamp An optional timestamp to use in the request.
     * @return string The X-Api-Signature string.
     */
    public function generateApiSignature($timestamp = null)
    {
        $timestamp = isset($timestamp) ? $timestamp : date('YmdHis');
        $data      = $this->userKey . CredentialsInterface::USER_AGENT . $timestamp . $this->secretKey;
        $signature = base64_encode(sha1($data, true));

        return sprintf('%s:%s:%s', $this->userKey, $timestamp, $signature);
    }
}
