<?php

namespace Piggy\Api\Models\Giftcards;

use DateTime;
use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Model;

/**
 * Class Giftcard
 * @package Piggy\Api\Models\Giftcards
 */
class Giftcard
{
    protected $dependencies = [
        "giftcard_program" => GiftcardProgram::class
    ];

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $uuid;

    /**
     * @var int
     */
    public $type;

    /**
     * @var string;
     */
    public $hash;

    /**
     * @var DateTime|null
     */
    public $expiration_date;

    /**
     * @var bool
     */
    public $active;

    /**
     * @var bool
     */
    public $upgradeable;

    /**
     * @var GiftcardProgram
     */
    public $giftcard_program;

    /**
     * @var int
     */
    public $amount_in_cents;

    public $amount;

    public $url;

    public $display_amount;

//
//    /**
//     * @param string $uuid
//     * @param string $hash
//     * @param int $amountInCents
//     * @param int $type
//     * @param bool $active
//     * @param bool $upgradeable
//     * @param GiftcardProgram|null $giftcardProgram
//     * @param DateTime|null $expirationDate
//     * @param int|null $id
//     */
//    public function __construct(string $uuid, string $hash, int $amountInCents, int $type, bool $active, bool $upgradeable, ?GiftcardProgram $giftcardProgram, ?DateTime $expirationDate, ?int $id)
//    {
//        $this->uuid = $uuid;
//        $this->hash = $hash;
//        $this->amount_in_cents = $amountInCents;
//        $this->type = $type;
//        $this->active = $active;
//        $this->upgradeable = $upgradeable;
//        $this->giftcardProgram = $giftcardProgram;
//        $this->expirationDate = $expirationDate;
//        $this->id = $id;
//    }
    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return DateTime|null
     */
    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isUpgradeable(): bool
    {
        return $this->upgradeable;
    }

    /**
     * @return GiftcardProgram|null
     */
    public function getGiftcardProgram(): ?GiftcardProgram
    {
        return $this->giftcardProgram;
    }

    /**
     * @return int
     */
    public function getAmountInCents(): int
    {
        return $this->amount_in_cents;
    }

    public function getId(): int
    {
        return $this->id;
    }

    protected static $staticResourceUri = "/api/v3/oauth/clients/giftcards";

//    /**
//     * @param array $params
//     * @return Giftcard
//     * @throws PiggyRequestException
//     */
//    public static function create(array $params): Giftcard
//    {
//        $response = Environment::post(self::$staticResourceUri, $params);
//
//        $instance = new self();
//
//        return self::parseResponse($response, $instance);
//    }
}