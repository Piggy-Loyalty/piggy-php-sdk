<?php

namespace Piggy\Api\Models\Forms;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Forms\FormsMapper;

/**
 * Class Form
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

    const resourceUri = "/api/v3/oauth/clients/forms";

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
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::resourceUri, $params);

        return FormsMapper::map((array)$response->getData());
    }
}