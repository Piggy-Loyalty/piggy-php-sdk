<?php

namespace Piggy\Api\Models\Loyalty;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Units\UnitMapper;
use Piggy\Api\Mappers\Units\UnitsMapper;

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
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/units";

    protected static $mapper = UnitMapper::class;

    /**
     * @param string $name
     * @param string|null $label
     * @param bool|null $isDefault
     */
    public function __construct(string $name, ?string $label, ?bool $isDefault)
    {
        $this->name = $name;
        $this->label = $label;
        $this->isDefault = $isDefault;
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

    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new UnitsMapper();

        return $mapper->map($response->getData());
    }

    public static function create(array $body): Unit
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
