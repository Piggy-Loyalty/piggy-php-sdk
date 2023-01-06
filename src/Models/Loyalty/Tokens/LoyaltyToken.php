<?php

namespace Piggy\Api\Models\Loyalty\Tokens;

use Piggy\Api\Models\Shops\Shop;

/**
 * Class LoyaltyTokens
 * @package Piggy\Api\Models\Loyalty
 */
class LoyaltyToken
{
    /**
     * @var Shop
     */
    protected $shop;

    /**
     * @var string
     */
    protected $uniqueId;

    /**
     * @var int | null
     */
    protected $credits;

    /**
     * @var string | null
     */
    protected $unitName;

    /**
     * @var float | null
     */
    protected $unitValue;


    /**
     * @param Shop $shop
     * @param string $uniqueId
     * @param int | null $credits
     * @param string | null $unitName
     * @param float | null $unitValue
     */
    public function __construct(Shop $shop, string $uniqueId, ?int $credits = null, ?string $unitName = null, ?float $unitValue = null)
    {
        $this->shop = $shop;
        $this->uniqueId = $uniqueId;
        $this->credits = $credits;
        $this->unitName = $unitName;
        $this->unitValue = $unitValue;
    }

    /**
     * @return Shop
     */
    public function getShopId(): Shop
    {
        return $this->shop;
    }

    /**
     * @return string
     */
    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    /**
     * @return int
     */
    public function getCredits(): int
    {
        return $this->credits;
    }




}
