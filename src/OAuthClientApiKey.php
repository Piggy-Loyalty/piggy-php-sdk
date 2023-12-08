<?php

namespace Piggy\Api;

use Piggy\Api\Http\BaseClient;

/**
 * Class OAuthClient
 * @package Piggy\Api
 * @deprecated
 */
class OAuthClientApiKey extends BaseClient
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * OAuthClient constructor.
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        parent::__construct();

        $this->setApiKey($apiKey);
    }

    /**
     * @param string $apiKey
     * @return $this
     */
    public function setApiKey(string $apiKey): self
    {
        $this->addHeader("Authorization", "Bearer $apiKey");

        return $this;
    }

}