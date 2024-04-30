<?php

namespace Piggy\Api\Models;

/**
 * Class OAuthToken
 */
class OAuthToken
{
    /**
     * @var string
     */
    protected $access_token;

    /**
     * @var string
     */
    protected $refresh_token;

    /**
     * @var string
     */
    protected $expires_in;

    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    public function setAccessToken(string $access_token)
    {
        $this->access_token = $access_token;
    }

    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }

    public function setRefreshToken(string $refresh_token)
    {
        $this->refresh_token = $refresh_token;
    }

    public function getExpiresIn(): string
    {
        return $this->expires_in;
    }

    public function setExpiresIn(string $expires_in)
    {
        $this->expires_in = $expires_in;
    }
}
