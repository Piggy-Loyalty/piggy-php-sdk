<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Loyalty\Receptions\RewardReceptionMapper;

/**
 * Class RewardReception
 */
class RewardReception
{
    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/reward-receptions';

    /**
     * @return DigitalRewardReception|PhysicalRewardReception|null
     *
     * @throws GuzzleException
     * @throws MaintenanceModeException
     * @throws PiggyRequestException
     */
    public static function create(array $body)
    {
        $response = ApiClient::post(self::resourceUri, $body);

        return RewardReceptionMapper::map($response->getData());
    }
}
