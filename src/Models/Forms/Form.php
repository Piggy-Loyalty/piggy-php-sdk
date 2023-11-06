<?php

namespace Piggy\Api\Models\Forms;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Forms\FormsMapper;

/**
 * Class Form
 * @package Piggy\Api\Models\Forms
 */
class Form
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var int
     */
    public $type;

    protected static $resourceUri = "/api/v3/oauth/clients/forms";

    protected static $mapper = FormsMapper::class;

    /**
     * @param string $uuid
     * @param string $name
     * @param string $status
     * @param string $type
     * @param string $url
     */
    public function __construct(string $name, string $status, string $url, string $uuid, string $type)
    {
        $this->name = $name;
        $this->status = $status;
        $this->url = $url;
        $this->uuid = $uuid;
        $this->type = $type;
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array[]
     * @throws PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new self::$mapper;

        return $mapper->map((array)$response->getData());
    }
}