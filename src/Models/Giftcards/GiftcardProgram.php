<?php

namespace Piggy\Api\Models\Giftcards;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Giftcards\GiftcardProgramsMapper;

class GiftcardProgram
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
     * @var bool
     */
    protected $active;

    protected static $resourceUri = "/api/v3/oauth/clients/giftcard-programs";

    /**
     * GiftcardProgram constructor.
     * @param string $uuid
     * @param string $name
     * @param bool $active
     */
    public function __construct(string $uuid, string $name, bool $active)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->active = $active;
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
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(): array
    {
        $response = ApiClient::get(self::$resourceUri);

        return GiftcardProgramsMapper::map($response->getData());
    }
}