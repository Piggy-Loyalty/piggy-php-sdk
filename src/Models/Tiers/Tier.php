<?php

namespace Piggy\Api\Models\Tiers;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Tiers\TierMapper;
use Piggy\Api\StaticMappers\Tiers\TiersMapper;

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
    const resourceUri = "/api/v3/oauth/clients/tiers";

    /**
     * @var string
     */
    const contactsResourceUri = "/api/v3/oauth/clients/contacts";

    /**
     * @param string $name
     * @param int $position
     * @param string|null $uuid
     * @param string|null $description
     * @param \stdClass|null $media
     */
    public function __construct(
        string  $name,
        int     $position,
        ?string $uuid = null,
        ?string $description = null,
        ?\stdClass  $media = null
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
     * @return \stdClass|null
     */
    public function getMedia(): ?\stdClass
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
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::resourceUri, $params);

        return TiersMapper::map((array)$response->getData());
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return Tier
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function findBy(string $contactUuid, array $params = []): Tier
    {
        $response = ApiClient::get(self::contactsResourceUri . "/$contactUuid/tier", $params);

        return TierMapper::map($response->getData());
    }
}
