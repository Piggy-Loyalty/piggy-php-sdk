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
    protected $amount;

    /**
     * @var DateTime
     */
    protected $created_at;

    public function __construct(string $uuid, int $amount, DateTime $createdAt)
    {
        $this->uuid = $uuid;
        $this->amount = $amount;
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
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}