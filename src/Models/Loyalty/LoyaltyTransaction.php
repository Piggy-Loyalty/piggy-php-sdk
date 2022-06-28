<?php

namespace Piggy\Api\Models\Loyalty;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Loyalty\Rewards\Reward;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class CreditReception
 * @package Piggy\Api\Models
 */
class LoyaltyTransaction
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
    private $contact;

    /**
     * @var Shop
     */
    private $shop;

    /**
     * @var ContactIdentifier|null
     */
    private $contactIdentifier;

    /**s
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var Reward
     */
    private $reward;

    /**
     * @var bool
     */
    private $hasBeenCollected;

    /**
     * @param string $type
     * @param int $credits
     * @param string $uuid
     * @param Contact $contact
     * @param Shop $shop
     * @param ContactIdentifier|null $contactIdentifier
     * @param string $createdAt
     * @param Reward $reward
     * @param bool $hasBeenCollected
     */
    public function __construct(string $type, int $credits, string $uuid, Contact $contact, Shop $shop, ?ContactIdentifier $contactIdentifier, string $createdAt, Reward $reward, bool $hasBeenCollected)
    {
        $this->type = $type;
        $this->credits = $credits;
        $this->uuid = $uuid;
        $this->contact = $contact;
        $this->shop = $shop;
        $this->contactIdentifier = $contactIdentifier;
        $this->createdAt = $createdAt;
        $this->reward = $reward;
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
     * @return Reward
     */
    public function getReward(): Reward
    {
        return $this->reward;
    }

    /**
     * @return bool
     */
    public function getHasBeenCollected(): bool
    {
        return $this->hasBeenCollected;
    }
}
