<?php

namespace Piggy\Api\Models\Automations;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Mappers\Automations2\AutomationsMapper;

/**
 * Class Automation
 * @package Piggy\Api\Models\Automations
 */
class Automation
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
    protected $event;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var DateTime
     */
    protected $updatedAt;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/automations";

    /**
     * @var string
     */
    protected static $mapper = AutomationsMapper::class;

    /**
     * @param string $name
     * @param string $status
     * @param string $event
     * @param DateTime $createdAt
     * @param DateTime $updatedAt
     */
    public function __construct(string $name, string $status, string $event, DateTime $createdAt, DateTime $updatedAt)
    {
        $this->name = $name;
        $this->status = $status;
        $this->event = $event;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return array
     * @throws GuzzleException
     */
    public static function list(): array
    {
        $response = ApiClient::get(self::$resourceUri, []);

        return AutomationsMapper::map($response);
    }

    /**
     * @param $params
     * @return array
     * @throws GuzzleException
     */
    public static function create($params): array
    {
        $response = ApiClient::post(self::$resourceUri . '/' . 'runs', $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

}
