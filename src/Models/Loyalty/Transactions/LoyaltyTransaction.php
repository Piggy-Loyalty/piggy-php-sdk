<?php

namespace Piggy\Api\Models\Loyalty\Transactions;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Loyalty\Rewards\Reward;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class LoyaltyTransaction
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
    protected $contact;

    /**
     * @var Shop
     */
    protected $shop;

    /**
     * @var ContactIdentifier|null
     */
    protected $contactIdentifier;

    /**s
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var Reward
     */
    protected $reward;

    /**
     * @var bool
     */
    protected $hasBeenCollected;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/loyalty-transactions';

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

    public function getType(): string
    {
        return $this->type;
    }

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function getShop(): Shop
    {
        return $this->shop;
    }

    public function getContactIdentifier(): ContactIdentifier
    {
        return $this->contactIdentifier;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getReward(): Reward
    {
        return $this->reward;
    }

    public function getHasBeenCollected(): bool
    {
        return $this->hasBeenCollected;
    }
}
