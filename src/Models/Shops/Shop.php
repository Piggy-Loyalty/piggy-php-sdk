<?php

namespace Piggy\Api\Models\Shops;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Shops\ShopMapper;
use Piggy\Api\StaticMappers\Shops\ShopsMapper;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
class Shop
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var string
     */
    const resourceUri = "/api/v3/oauth/clients/shops";

    /**
     * @param string $uuid
     * @param string $name
     * @param int | null $id
     */
    public function __construct(string $uuid, string $name, ?int $id)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::resourceUri, $params);

        return ShopsMapper::map($response->getData());
    }

    /**
     * @param string $shopUuid
     * @param array $params
     * @return Shop
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function get(string $shopUuid, array $params = []): Shop
    {
        $response = ApiClient::get(self::resourceUri . "/$shopUuid", $params);

        return ShopMapper::map($response->getData());
    }
}
