<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\PiggyClient;

abstract class BaseEndpoint
{
    protected PiggyClient $client;

    protected string $resourceUri;

    public function __construct(PiggyClient $client)
    {
        $this->client = $client;
    }
}
