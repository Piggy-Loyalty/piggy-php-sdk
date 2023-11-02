<?php

namespace Piggy\Api\Models\Loyalty\Token;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Loyalty\Receptions\CreditReception;

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
     * @param array $body
     * @return string
     * @throws PiggyRequestException
     */
    public static function create(array $body): string
    {
        $response = Environment::post(self::$resourceUri, $body);

        return $response->getData();
    }

    /**
     * @param array $body
     * @return CreditReception
     * @throws PiggyRequestException
     */
    public static function claim(array $body): CreditReception
    {
        $response = Environment::post(self::$resourceUri . "/claim", $body);

        $mapper = new CreditReceptionMapper();

        return $mapper->map($response->getData());
    }
}