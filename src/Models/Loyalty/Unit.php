<?php

namespace Piggy\Api\Models\Loyalty;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Units\UnitMapper;
use Piggy\Api\StaticMappers\Units\UnitsMapper;

/**
 * Class Unit
 * @package Piggy\Api\Models\Loyalty
 */
class Unit
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $label;

    /** @var bool|null */
    protected $isDefault;

    /**
     * @var string|null
     */
    protected $prefix;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/units";

    /**
     * @param string $name
     * @param string|null $label
     * @param bool|null $isDefault
     * @param string|null $prefix
     */
    public function __construct(string $name, ?string $label, ?bool $isDefault, ?string $prefix)
    {
        $this->name = $name;
        $this->label = $label;
        $this->isDefault = $isDefault;
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /** @return bool| null */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    /**
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::$resourceUri, $params);

        return UnitsMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return Unit
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $params): Unit
    {
        $response = ApiClient::post(self::$resourceUri, $params);

        return UnitMapper::map($response->getData());
    }
}
