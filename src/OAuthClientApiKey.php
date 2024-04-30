<?php

namespace Piggy\Api;

use Piggy\Api\Http\BaseClient;

/**
 * Class OAuthClient
 */
class OAuthClientApiKey extends BaseClient
{
    /**
     * OAuthClient constructor.
     */
    public function __construct(string $apiKey)
    {
        parent::__construct();

        $this->setApiKey($apiKey);
    }

    /**
     * @return $this
     */
    public function setApiKey(string $apiKey): self
    {
        $this->addHeader('Authorization', "Bearer $apiKey");

        return $this;
    }
}
