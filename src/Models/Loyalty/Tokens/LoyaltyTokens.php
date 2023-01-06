<?php

namespace Piggy\Api\Models\Loyalty\Tokens;

use App\Piggy\Models\Interfaces\ShopInterface;
use DateTime;
use Piggy\Api\Models\Shops\Shop;

/**
 * Class LoyaltyTokens
 * @package Piggy\Api\Models\Loyalty
 */
class LoyaltyTokens
{
    /**
     * @var string
     */
    protected $version;

    /**
     * @var ShopInterface
     */
    protected $shop;

    /**
     * @var string
     */
    protected $uniqueId;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @param string $version,
     * @param string $uniqueId,
     * @param string $uuid
     * @param Shop $shop
     * @param DateTime $createdAt
     */
    public function __construct(string $version, string $uniqueId, string $uuid, Shop $shop, DateTime $createdAt)
    {
        $this->version = $version;
        $this->shop = $shop;
        $this->uniqueId = $uniqueId;
        $this->uuid = $uuid;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

}
