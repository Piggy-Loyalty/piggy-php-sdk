<?php

namespace Piggy\Api\Models\Tiers;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Tiers\TierMapper;
use Piggy\Api\Mappers\Tiers\TiersMapper;

/**
 * Class Tier
 * @package Piggy\Api\Models\Tiers
 */
class Tier
{
    /**
     * @var string|null
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $description;
    /**
     * @var array|null
     */
    protected $media;
    /**
     * @var int
     */
    protected $position;

    /**
     * @var string
     */
    protected static $mapper = TierMapper::class;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/tiers";

    /**
     * @param string $name
     * @param int $position
     * @param string|null $uuid
     * @param string|null $description
     * @param array|null $media
     */
    public function __construct(
        string  $name,
        int     $position,
        ?string $uuid = null,
        ?string $description = null,
        ?array  $media = null
    )
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->media = $media;
        $this->position = $position;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return array|null
     */
    public function getMedia(): ?array
    {
        return $this->media;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param array $params
     * @return array
     * @throws PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new TiersMapper();

        return $mapper->map((array)$response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return Tier
     * @throws PiggyRequestException
     */
    public static function getTierForContact(string $contactUuid, array $params = []): Tier
    {
        $response = Environment::get("/api/v3/oauth/clients/contacts" . "/$contactUuid/tier", $params);

        $mapper = new self::$mapper();

        return $mapper->map($response->getData());
    }
}
