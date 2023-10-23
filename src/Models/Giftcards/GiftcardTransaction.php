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

    /**
     * @var Giftcard
     */
    protected $card_id;

    /**
     * @var int
     */
    protected $shop_id;

    /**
     * @var bool
     */
    protected $settled;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array[]
     */
    protected $settlements;

    public function __construct(string $uuid, int $amountInCents, DateTime $createdAt, ?string $type = null, ?bool $settled = null, ?int $cardId = null, ?int $shopId = null, ?array $settlements = null, ?int $id)
    {
        $this->uuid = $uuid;
        $this->amount_in_cents = $amountInCents;
        $this->created_at = $createdAt;
        $this->type = $type;
        $this->settled = $settled;
        $this->card_id = $cardId;
        $this->shop_id = $shopId;
        $this->settlements = $settlements;
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

    /**
     * @return int
     */
    public function getGiftcardId(): int
    {
        return $this->card_id;
    }


    /**
     * @return int
     */
    public function getShopId(): int
    {
        return $this->shop_id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isSettled(): bool
    {
        return $this->settled;
    }

    /**
     * @return GiftcardTransactionSettlement[]
     */
    public function getSettlements(): array
    {
        return $this->settlements;
    }

    public function getId(): int
    {
        return $this->id;
    }
}