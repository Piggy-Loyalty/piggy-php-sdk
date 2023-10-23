<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use Exception;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Resources\BaseResource;

/**
 * Class ContactVerificationResource
 * @package Piggy\Api\Resources\OAuth
 */
class ContactVerificationResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "/api/v3/oauth/clients/contact-verification";

    /**
     * @param string $email
     *
     * @return bool
     */
    public function sendVerificationMail(string $email): bool
    {
        try {
            $this->client->post("$this->resourceUri/send", [
                "email" => $email
            ]);
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * @param string $code
     * @param string $email
     *
     * @return bool
     */
    public function verifyLoginCode(string $code, string $email): bool
    {
        try {
            $this->client->post("$this->resourceUri/verify", [
                "email" => $email,
                "code" => $code
            ]);
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * @throws PiggyRequestException
     */
    public function getAuthToken(string $contactUuid): string
    {
        $response = $this->client->get("$this->resourceUri/auth-token/$contactUuid");

        return $response->getData();

    }
}
