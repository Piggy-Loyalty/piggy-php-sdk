<?php

namespace Piggy\Api\Models\Giftcards;

use DateTime;

/**
 * Class Giftcard
 */
class Giftcard
{
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
    public $expirationDate;

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
    public $giftcardProgram;

    /**
     * @var int
     */
    public $amountInCents;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/giftcards';

    public function __construct(string $uuid, string $hash, int $amountInCents, int $type, bool $active, bool $upgradeable, ?GiftcardProgram $giftcardProgram, ?DateTime $expirationDate, ?int $id)
    {
        $this->uuid = $uuid;
        $this->hash = $hash;
        $this->amountInCents = $amountInCents;
        $this->type = $type;
        $this->active = $active;
        $this->upgradeable = $upgradeable;
        $this->giftcardProgram = $giftcardProgram;
        $this->expirationDate = $expirationDate;
        $this->id = $id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getExpirationDate(): ?DateTime
    {
        return $this->expirationDate;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isUpgradeable(): bool
    {
        return $this->upgradeable;
    }

    public function getGiftcardProgram(): ?GiftcardProgram
    {
        return $this->giftcardProgram;
    }

    public function getAmountInCents(): int
    {
        return $this->amountInCents;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
