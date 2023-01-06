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
     * @var int
     */
    protected $credits;

    /**
     * @var string | null
     */
    protected $url;

    /**
     * @param Shop $shop
     * @param string $uniqueId
     * @param int $credits
     * @param string | null $url
     */
    public function __construct(Shop $shop, string $uniqueId, int $credits, string $url = null)
    {
        $this->shop = $shop;
        $this->uniqueId = $uniqueId;
        $this->credit = $credits;
        $this->url = $url;
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

    /**
     * @return string | null
     */
    public function getUrl(): string
    {
        return $this->url;
    }


}
