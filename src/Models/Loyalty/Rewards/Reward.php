<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Rewards\RewardMapper;
use Piggy\Api\Mappers\Loyalty\Rewards\RewardsMapper;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Loyalty\Media;

/**
 *
 */
class Reward
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var int|null
     */
    protected $requiredCredits;

    /**
     * @var Media|null
     */
    protected $media;

    /**
     * @var bool|null
     */
    protected $active;

    /**
     * @var string
     */
    protected $rewardType;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var DateTime
     */
    protected $expiresAt;

    /**
     * @var bool|null
     */
    protected $hasBeenCollected;

    /**w
     * @var string
     */
    protected static $mapper = RewardMapper::class;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/rewards";

    /**
     * @param string $uuid
     * @param string|null $title
     * @param int|null $requiredCredits
     * @param Media|null $media
     * @param string|null $description
     * @param bool|null $active
     * @param string|null $rewardType
     * @param array $attributes
     * @param Contact|null $contact
     * @param DateTime|null $expiresAt
     * @param bool $hasBeenCollected
     */
    public function __construct(string $uuid, ?string $title = '', ?int $requiredCredits = null, ?Media $media = null, ?string $description = "", ?bool $active = true, ?string $rewardType = null, array $attributes = [], ?Contact $contact = null, ?DateTime $expiresAt = null, ?bool $hasBeenCollected = false)
    {
        $this->uuid = $uuid;
        $this->title = $title;
        $this->description = $description;
        $this->requiredCredits = $requiredCredits;
        $this->media = $media;
        $this->active = $active;
        $this->rewardType = $rewardType;
        $this->attributes = $attributes;
        $this->contact = $contact;
        $this->expiresAt = $expiresAt;
        $this->hasBeenCollected = $hasBeenCollected;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return int|null
     */
    public function getRequiredCredits(): ?int
    {
        return $this->requiredCredits;
    }

    /**
     * @param int $requiredCredits
     * @return void
     */
    public function setRequiredCredits(int $requiredCredits): void
    {
        $this->requiredCredits = $requiredCredits;
    }

    /**
     * @return Media|null
     */
    public function getMedia(): ?Media
    {
        return $this->media;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @return string|null
     */
    public function getRewardType(): ?string
    {
        return $this->rewardType;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param string $name
     * @param $value
     *
     * @return void
     */
    public function setAttribute(string $name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new RewardsMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param $rewardUuid
     * @param array $body
     * @return Reward
     * @throws PiggyRequestException
     */
    public static function update($rewardUuid, array $body): Reward
    {
        $response = Environment::put(self::$resourceUri . "/$rewardUuid", $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}