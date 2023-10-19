<?php

namespace Piggy\Api\Models\Giftcards;

use Piggy\Api\Models\Shops\Shop;

class GiftcardTransactionSettlement
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $amount_in_cents;

    /**
     * @var int
     */
    public $type;

    /**
     * @var Shop
     */
    public $incremented_shop;

    /**
     * @var Shop
     */
    public $decremented_shop;

    public function __construct(int $id, int $amount_in_cents, int $type, Shop $incremented_shop, Shop $decremented_shop)
    {
        $this->id = $id;
        $this->amount_in_cents = $amount_in_cents;
        $this->type = $type;
        $this->incremented_shop = $incremented_shop;
        $this->decremented_shop = $decremented_shop;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAmountInCents(): int
    {
        return $this->amount_in_cents;
    }

    public function setAmountInCents(int $amount_in_cents): void
    {
        $this->amount_in_cents = $amount_in_cents;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getIncrementedShop(): Shop
    {
        return $this->incremented_shop;
    }

    public function setIncrementedShop(Shop $incremented_shop): void
    {
        $this->incremented_shop = $incremented_shop;
    }

    public function getDecrementedShop(): Shop
    {
        return $this->decremented_shop;
    }

    public function setDecrementedShop(Shop $decremented_shop): void
    {
        $this->decremented_shop = $decremented_shop;
    }

}