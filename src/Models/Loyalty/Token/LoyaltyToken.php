<?php

namespace Piggy\Api\Models\Loyalty\Token;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;
use Piggy\Api\StaticMappers\Loyalty\Receptions\CreditReceptionMapper;

/**
 * Class LoyaltyToken
 * @package Piggy\Api\Models\Loyalty\Receptions
 */
class LoyaltyToken
{
    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/loyalty-tokens";

    /**
     * @param array $params
     * @return string
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $params): string
    {
        $response = ApiClient::post(self::$resourceUri, $params);

        return $response->getData();
    }

    /**
     * @param array $params
     * @return CreditReception
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function claim(array $params): CreditReception
    {
        $response = ApiClient::post(self::$resourceUri . "/claim", $params);

        return CreditReceptionMapper::map($response->getData());
    }
}
