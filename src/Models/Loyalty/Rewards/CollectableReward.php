<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use DateTime;
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
}
