<?php

namespace Piggy\Api\Models;

/**
 * Class OAuthToken
 * @package Piggy\Api\Models
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

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     *
     * @return void
     */
    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }

    /**
     * @param string $refresh_token
     *
     * @return void
     */
    public function setRefreshToken(string $refresh_token): void
    {
        $this->refresh_token = $refresh_token;
    }

    /**
     * @return string
     */
    public function getExpiresIn(): string
    {
        return $this->expires_in;
    }

    /**
     * @param string $expires_in
     *
     * @return void
     */
    public function setExpiresIn(string $expires_in): void
    {
        $this->expires_in = $expires_in;
    }
}
