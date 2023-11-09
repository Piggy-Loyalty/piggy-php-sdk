<?php

namespace Piggy\Api\StaticMappers;

use Piggy\Api\Models\OAuthToken;

/**
 * Class OAuthTokenMapper
 * @package Piggy\Api\Mappers
 */
class OAuthTokenMapper
{
    /**
     * @param object $data
     * @return OAuthToken
     */
    public function map(object $data): OAuthToken
    {
        $token = new OAuthToken();

        $token->setAccessToken($data->getAccessToken());
        $token->setExpiresIn($data->getExpiresIn());

        return $token;
    }
}