<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Loyalty\Receptions\RewardReceptionMapper;

/**
 * Class RewardReception
 * @package Piggy\Api\Models\Loyalty\Receptions
 */
class RewardReception
{
    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/reward-receptions";

    /**
     * @param array $params
     * @return DigitalRewardReception|PhysicalRewardReception|null
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body)
    {
        $response = ApiClient::post(self::$resourceUri, $body);

        return RewardReceptionMapper::map($response->getData());
    }
}