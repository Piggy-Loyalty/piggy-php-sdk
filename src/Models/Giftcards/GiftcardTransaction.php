<?php

namespace Piggy\Api\Models\Giftcards;

use DateTime;

/**
 * Class GiftcardTransaction
 * @package Piggy\Api\Models\Giftcards
 */
class GiftcardTransaction
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var int
     */
    protected $amount_in_cents;

    /**
     * @var DateTime
     */
    protected $created_at;

    public function __construct(string $uuid, int $amountInCents, DateTime $createdAt)
    {
        $this->uuid = $uuid;
        $this->amount_in_cents = $amountInCents;
        $this->created_at = $createdAt;
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
    public function getAmountInCents(): int
    {
        return $this->amount_in_cents;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}