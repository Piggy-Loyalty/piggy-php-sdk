<?php

namespace Piggy\Api\Http\Responses;

/**
 * Class AuthenticationResponse
 */
class AuthenticationResponse
{
    /**
     * @var string
     */
    private $tokenType;

    /**
     * @var string
     */
    private $expiresIn;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * AuthenticationResponse constructor.
     */
    public function __construct(object $data)
    {
        $this->tokenType = $data->token_type;
        $this->expiresIn = $data->expires_in;
        $this->accessToken = $data->access_token;
    }

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
}
