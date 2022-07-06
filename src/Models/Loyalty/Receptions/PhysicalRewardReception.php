<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Loyalty\Rewards\Reward;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class CreditReception
 * @package Piggy\Api\Models
 */
class PhysicalRewardReception
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $credits;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Shop
     */
    protected $shop;

    /**
     * @var ContactIdentifier|null
     */
    protected $contactIdentifier;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var DateTime|null
     */
    protected $expiresAt;

    /**
     * @var Reward
     */
    protected $reward;

    /**
     * @var bool
     */
    protected $hasBeenCollected;

    /**
     * @param string $type
     * @param int $credits
     * @param string $uuid
     * @param Contact $contact
     * @param Shop $shop
     * @param ContactIdentifier|null $contactIdentifier
     * @param DateTime $createdAt
     * @param string $title
     * @param Reward $reward
     * @param DateTime|null $expiresAt
     * @param bool $hasBeenCollected
     */
    public function __construct(string $type, int $credits, string $uuid, Contact $contact, Shop $shop, ?ContactIdentifier $contactIdentifier, DateTime $createdAt, string $title, Reward $reward, ?DateTime $expiresAt, bool $hasBeenCollected)
    {
        $this->type = $type;
        $this->credits = $credits;
        $this->uuid = $uuid;
        $this->contact = $contact;
        $this->shop = $shop;
        $this->contactIdentifier = $contactIdentifier;
        $this->createdAt = $createdAt;
        $this->title = $title;
        $this->reward = $reward;
        $this->expiresAt = $expiresAt;
        $this->hasBeenCollected = $hasBeenCollected;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getCredits(): int
    {
        return $this->credits;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @return ContactIdentifier
     */
    public function getContactIdentifier(): ContactIdentifier
    {
        return $this->contactIdentifier;
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
     * @return DateTime |null
     */
    public function getExpiresAt(): ?DateTime
    {
        return $this->expiresAt;
    }

    /**
     * @return bool
     */
    public function getHasBeenCollected(): bool
    {
        return $this->hasBeenCollected;
    }

}
