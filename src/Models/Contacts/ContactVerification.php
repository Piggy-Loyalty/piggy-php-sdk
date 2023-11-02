<?php

namespace Piggy\Api\Models\Contacts;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;

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
     * @return \stdClass
     * @throws PiggyRequestException
     */
    public static function sendVerificationMail(array $body): \stdClass
    {
        $response = Environment::post(self::$resourceUri . "/send", $body);

        return $response->getData();
    }

    /**
     * @param array $body
     * @return \stdClass
     * @throws PiggyRequestException
     */
    public static function verifyLoginCode(array $body): \stdClass
    {
        $response = Environment::post(self::$resourceUri . "/verify", $body);

        return $response->getData();
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return string
     * @throws PiggyRequestException
     */
    public static function getAuthToken(string $contactUuid, array $params = []): string
    {
        $response = Environment::get(self::$resourceUri . "/auth-token/$contactUuid", $params);

        return $response->getData();
    }
}