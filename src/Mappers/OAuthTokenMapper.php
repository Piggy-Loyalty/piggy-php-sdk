<?php

namespace Piggy\Api\Mappers;

use Piggy\Api\Models\OAuthToken;

/**
 * Class OAuthTokenMapper
 */
class OAuthTokenMapper
{
    public function map(object $data): OAuthToken
    {
        $token = new OAuthToken();

        $token->setAccessToken($data->getAccessToken());
        $token->setExpiresIn($data->getExpiresIn());

        return $token;
    }
}
