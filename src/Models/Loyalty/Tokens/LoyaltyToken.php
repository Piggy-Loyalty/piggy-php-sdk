<?php

namespace Piggy\Api\Models\Loyalty\Tokens;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Loyalty\Unit;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class LoyaltyToken
 * @package Piggy\Api\Models\Loyalty
 */
class LoyaltyToken
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var int | null
     */
    protected $credits;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var Shop
     */
    private $shop;

//    /**
//     * @var ContactIdentifier | null
//     */
//    private $contactIdentifier;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var float
     */
    protected $unitValue;

    /**
     * @var Unit
     */
    protected $unit;

    /**
     * @param string $type
     * @param int $credits
     * @param Contact $contact
     * @param Shop $shop
     * @param string $uuid
     * @param DateTime $createdAt
     * @param float | null $unitValue
//     * @param ContactIdentifier | null $contactIdentifier
     * @param Unit| null $unit
     */
    public function __construct(string $type, int $credits, Contact $contact, Shop $shop, string $uuid, DateTime $createdAt, ?Unit $unit = null, ?float $unitValue = null
//                                ?ContactIdentifier $contactIdentifier = null
    )
    {
        $this->type = $type;
        $this->credits = $credits;
        $this->contact = $contact;
        $this->shop = $shop;
//        $this->contactIdentifier = $contactIdentifier;
        $this->createdAt = $createdAt;
        $this->uuid = $uuid;
        $this->unitValue = $unitValue;
        $this->unit = $unit;
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

//    /**
//     * @return ContactIdentifier | null
//     */
//    public function getContactIdentifier(): ?ContactIdentifier
//    {
//        return $this->contactIdentifier;
//    }

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
     * @return float|null
     */
    public function getUnitValue(): float
    {
        return $this->unitValue;
    }

    /**
     * @return Unit|null
     */
    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

}
