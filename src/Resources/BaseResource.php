<?php

namespace Piggy\Api\Resources;

use Piggy\Api\Http\BaseClient;

/**
 * Class BaseResource
 */
abstract class BaseResource
{
    /**
     * @var BaseClient
     */
    protected $client;

    /**
     * BaseResource constructor.
     */
    public function __construct(BaseClient $client)
    {
        $this->client = $client;

    }
}
