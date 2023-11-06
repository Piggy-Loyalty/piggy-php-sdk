<?php

namespace Piggy\Api\Models\Loyalty\Receptions;

use DateTime;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\Receptions\CreditReceptionMapper;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Contacts\ContactIdentifier;
use Piggy\Api\Models\Loyalty\Unit;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class CreditReception
 * @package Piggy\Api\Models\Loyalty\Receptions
 */
class CreditReception
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

    /**
     * @var DateTime
     */
    protected $createdAt;

    /** @var int */
    protected $unitValue;

    /** @var Unit */
    protected $unit;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/credit-receptions";

    /**
     * @var string
     */
    protected static $mapper = CreditReceptionMapper::class;

    /**
     * @param string $type
     * @param int $credits
     * @param string $uuid
     * @param Contact $contact
     * @param Shop $shop
     * @param ContactIdentifier|null $contactIdentifier
     * @param DateTime $createdAt
     * @param float|null $unitValue
     * @param Unit|null $unit
     */
    public function __construct(string $type, int $credits, string $uuid, Contact $contact, Shop $shop, ?ContactIdentifier $contactIdentifier, DateTime $createdAt, ?float $unitValue = null, ?Unit $unit = null)
    {
        $this->type = $type;
        $this->credits = $credits;
        $this->uuid = $uuid;
        $this->contact = $contact;
        $this->shop = $shop;
        $this->contactIdentifier = $contactIdentifier;
        $this->createdAt = $createdAt;
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
     * @return float|null
     */
    public function getUnitValue(): ?float
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

    /**
     * @param array $body
     * @return CreditReception
     * @throws PiggyRequestException
     */
    public static function create(array $body): CreditReception
    {
        $response = Environment::post(self::$resourceUri, $body);

//        $mapper = new CreditReceptionMapper();
        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $params
     * @return int
     * @throws PiggyRequestException
     */
    public static function calculate(array $params): \stdClass
    {
        $response = Environment::get(self::$resourceUri . "/calculate", $params);

        return $response->getData();
    }
}
