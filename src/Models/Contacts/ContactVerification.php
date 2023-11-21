<?php

namespace Piggy\Api\Models\Contacts;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
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
     * @param array $params
     * @return stdClass
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function sendVerificationMail(array $params): stdClass
    {
        $response = ApiClient::post(self::$resourceUri . "/send", $params);

        return $response->getData();
    }

    /**
     * @param array $params
     * @return stdClass
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function verifyLoginCode(array $params): stdClass
    {
        $response = ApiClient::post(self::$resourceUri . "/verify", $params);

        return $response->getData();
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return string
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function getAuthToken(string $contactUuid, array $params = []): string
    {
        $response = ApiClient::get(self::$resourceUri . "/auth-token/$contactUuid", $params);

        return $response->getData();
    }
}