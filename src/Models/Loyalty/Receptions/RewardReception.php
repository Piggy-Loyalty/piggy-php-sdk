<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use Piggy\Api\Environment;
use Piggy\Api\Mappers\Loyalty\Receptions\RewardReceptionMapper;

class RewardReception
{
    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/reward-receptions";

    public static function create(array $body)
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new RewardReceptionMapper();

        return $mapper->map($response->getData());
    }
}