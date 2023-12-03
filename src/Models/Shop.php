<?php

namespace Piggy\Api\Models;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Responses\Response;

/**
 * Class Shop
 * @package Piggy\Api\Models
 */
class Shop
{
    protected $allowed = [
        "id",
        "uuid",
        "name"
    ];

    protected static $resourceUri = "/api/v3/oauth/clients/shops";

//    /**e
//     * @param array $params
//     * @return array
//     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
//     */
//    public static function list(array $params = []): array //todo implement 'ListResult'
//    {
//        $response = ApiClient::get(self::$resourceUri, $params);
//
//        return array(($response->getData()));
//    }

//    /**
//     * @param string $shopUuid
//     * @param array $params
//     * @return Shop
//     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
//     */
//    public static function get(string $shopUuid, array $params = []): Shop
//    {
//        $response = ApiClient::get(self::$resourceUri . "/$shopUuid", $params);
//
//        return ShopMapper::map($response->getData());
//    }

    public static function get(string $shopUuid, array $params = []): Response
    {
        return ApiClient::get(self::$resourceUri . "/$shopUuid", $params);
    }
}
