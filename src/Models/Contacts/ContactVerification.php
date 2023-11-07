<?php

namespace Piggy\Api\Models\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use stdClass;

/**
 * Class Contact
 * @package Piggy\Api\Models\Contacts
 */
class ContactVerification
{
    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/contact-verification";

    /**
     * @param array $body
     * @return stdClass
     * @throws GuzzleException
     */
    public static function sendVerificationMail(array $body): stdClass
    {
        $response = ApiClient::post(self::$resourceUri . "/send", $body);

        return $response->getData();
    }

    /**
     * @param array $body
     * @return stdClass
     * @throws GuzzleException
     */
    public static function verifyLoginCode(array $body): stdClass
    {
        $response = ApiClient::post(self::$resourceUri . "/verify", $body);

        return $response->getData();
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return string
     * @throws GuzzleException
     */
    public static function getAuthToken(string $contactUuid, array $params = []): string
    {
        $response = ApiClient::get(self::$resourceUri . "/auth-token/$contactUuid", $params);

        return $response->getData();
    }
}