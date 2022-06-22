<?php

namespace Piggy\Api\Resources\OAuth;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Resources\BaseResource;
use stdClass;

/**
 * Class ContactVerificationResource
 * @package Piggy\Api\Resources\OAuth
 */
class ContactVerificationResource extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceUri = "api/v3/oauth/clients/contact-verification";


    /**
     * @param $email
     * @return bool
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function sendVerificationMail($email): bool
    {
        $response = $this->client->post("{$this->resourceUri}/send", [
            "email" => $email
        ]);

        if ($response->getData()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param $code
     * @param $email
     * @return bool
     * @throws GuzzleException
     * @throws PiggyRequestException
     */
    public function verifyLoginCode($code, $email): bool
    {
        $response = $this->client->post("{$this->resourceUri}/verify", [
            "email" => $email,
            "code" => $code
        ]);

        if ($response->getData()) {
            return true;
        } else {
            return false;
        }
    }
}
