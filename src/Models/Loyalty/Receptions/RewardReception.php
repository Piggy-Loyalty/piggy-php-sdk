<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
use Piggy\Api\Mappers\Loyalty\Receptions\RewardReceptionMapper;

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
     * @var string
     */
    protected static $mapper = RewardReceptionMapper::class;

    /**
     * @param array $body
     * @return mixed
     * @throws GuzzleException
     */
    public static function create(array $body)
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}