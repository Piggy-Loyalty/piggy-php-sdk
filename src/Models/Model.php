<?php

namespace Piggy\Api\Models\Giftcards;

use DateTime;

/**
 *
 */
class Model
{
    protected $allowed = [
        "id",
        "uuid",
        "type",
        "hash",
        "expiration_date",
        "activate",
        "giftcard_program",
        "upgradeable",
    ];

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var int
     */
    public $type;

    /**
     * @var string;
     */
    protected $hash;

    /**
     * @var DateTime|null
     */
    protected $expirationDate;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var bool
     */
    protected $upgradeable;

    /**
     * @var GiftcardProgram
     */
    protected $giftcardProgram;
    /**
     * @var int
     */
    protected $amount_in_cents;

    /**
     * @var int
     */
    protected $id;

    /**
     * @param string $uuid
     * @param string $hash
     * @param int $amountInCents
     * @param int $type
     * @param bool $active
     * @param bool $upgradeable
     * @param GiftcardProgram|null $giftcardProgram
     * @param DateTime|null $expirationDate
     * @param int|null $id
     */
    public function __construct(string $uuid, string $hash, int $amountInCents, int $type, bool $active, bool $upgradeable, ?GiftcardProgram $giftcardProgram, ?DateTime $expirationDate, ?int $id)
    {
        $this->uuid = $uuid;
        $this->hash = $hash;
        $this->amount_in_cents = $amountInCents;
        $this->type = $type;
        $this->active = $active;
        $this->upgradeable = $upgradeable;
        $this->giftcardProgram = $giftcardProgram;
        $this->expirationDate = $expirationDate;
        $this->id = $id;
    }

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

}