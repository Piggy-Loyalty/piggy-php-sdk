<?php

namespace Piggy\Api\Resources\OAuth\Contacts;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
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
     * @return bool
     * @throws GuzzleException
     */
    public function sendVerificationMail(string $email): bool
    {
        try {
            $this->client->post("{$this->resourceUri}/send", [
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
     * @return bool
     * @throws GuzzleException
     */
    public function verifyLoginCode(string $code, string $email): bool
    {
        try {
            $this->client->post("{$this->resourceUri}/verify", [
                "email" => $email,
                "code" => $code
            ]);
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }
}
