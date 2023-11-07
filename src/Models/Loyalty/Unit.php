<?php

namespace Piggy\Api\Models\Loyalty;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
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
     * @var string|null
     */
    protected $prefix;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/units";

    /**
     * @var string
     */
    protected static $mapper = UnitMapper::class;

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
     * @throws GuzzleException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new UnitsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return Unit
     * @throws GuzzleException
     */
    public static function create(array $body): Unit
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
