<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use DateTime;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Loyalty\Rewards\CollectableRewardMapper;
use Piggy\Api\StaticMappers\Loyalty\Rewards\CollectableRewardsMapper;
use Piggy\Api\Models\Contacts\Contact;

/**
 * Class CollectableReward
 * @package Piggy\Api\Models\Rewards
 */
class CollectableReward
{
    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var Reward
     */
    protected $reward;

    /**
     * @var DateTime
     */
    protected $expiresAt;

    /**
     * @var bool
     */
    protected $hasBeenCollected;

    /**
     * @var string
     */
    const resourceUri = "/api/v3/oauth/clients/collectable-rewards";

    /**
     * @param Contact $contact
     * @param DateTime $createdAt
     * @param string $uuid
     * @param string $title
     * @param Reward $reward
     * @param DateTime $expiresAt
     * @param bool $hasBeenCollected
     */
    public function __construct(
        Contact  $contact,
        DateTime $createdAt,
        string   $uuid,
        string   $title,
        Reward   $reward,
        DateTime $expiresAt,
        bool     $hasBeenCollected
    )
    {
        $this->contact = $contact;
        $this->createdAt = $createdAt;
        $this->uuid = $uuid;
        $this->title = $title;
        $this->reward = $reward;
        $this->expiresAt = $expiresAt;
        $this->hasBeenCollected = $hasBeenCollected;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return Reward
     */
    public function getReward(): Reward
    {
        return $this->reward;
    }

    /**
     * @return DateTime
     */
    public function getExpiresAt(): DateTime
    {
        return $this->expiresAt;
    }

    /**
     * @return bool
     */
    public function hasBeenCollected(): bool
    {
        return $this->hasBeenCollected;
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     * @throws Exception
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::resourceUri, $params);

        return CollectableRewardsMapper::map($response->getData());
    }

    /**
     * @param string $loyaltyTransactionUuid
     * @param array $params
     * @return CollectableReward
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     * @throws Exception
     */
    public static function collect(string $loyaltyTransactionUuid, array $params = []): CollectableReward
    {
        $response = ApiClient::put(self::resourceUri . "/collect/$loyaltyTransactionUuid", $params);

        return CollectableRewardMapper::map($response->getData());
    }
}
