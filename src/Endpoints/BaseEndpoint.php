<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\PiggyClient;

abstract class BaseEndpoint
{
    protected PiggyClient $client;

    public function __construct(PiggyClient $client)
    {
        $this->client = $client;
    }
}
