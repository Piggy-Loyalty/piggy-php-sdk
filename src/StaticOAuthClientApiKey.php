<?php

namespace Piggy\Api;

use Piggy\Api\Http\BaseClient;
use Piggy\Api\Http\StaticBaseClient;

/**
 * Class OAuthClient
 * @package Piggy\Api
 */
class StaticOAuthClientApiKey extends StaticBaseClient
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

        $this->staticSetApiKey($apiKey);
    }

    public static function staticSetApiKey(string $apiKey)
    {
        self::addHeader("Authorization", "Bearer $apiKey");
    }
}

