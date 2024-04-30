<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Loyalty\Rewards\DigitalReward;
use Piggy\Api\Models\Loyalty\Rewards\DigitalRewardCode;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class DigitalRewardReception
 */
class DigitalRewardReception extends BaseReception
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
     * @var DigitalReward
     */
    protected $digitalReward;

    /**
     * @var DigitalRewardCode
     */
    protected $digitalRewardCode;

    public function __construct(string $type, int $credits, string $uuid, Contact $contact, Shop $shop, ?ContactIdentifier $contactIdentifier, DateTime $createdAt, string $title, DigitalReward $digitalReward, DigitalRewardCode $digitalRewardCode)
    {
        $this->type = $type;
        $this->credits = $credits;
        $this->uuid = $uuid;
        $this->contact = $contact;
        $this->shop = $shop;
        $this->contactIdentifier = $contactIdentifier;
        $this->createdAt = $createdAt;
        $this->title = $title;
        $this->digitalReward = $digitalReward;
        $this->digitalRewardCode = $digitalRewardCode;
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

    public function getContactIdentifier(): ?ContactIdentifier
    {
        return $this->contactIdentifier;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDigitalReward(): DigitalReward
    {
        return $this->digitalReward;
    }

    public function getDigitalRewardCode(): DigitalRewardCode
    {
        return $this->digitalRewardCode;
    }
}
