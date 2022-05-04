<?php

namespace Piggy\Api\Models\Shops;

use Piggy\Api\Models\Loyalty\LoyaltyProgram;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
abstract class Shop
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var LoyaltyProgram|null $loyaltyProgram
     */
    protected $loyaltyProgram;

    /**
     * @param string $id
     * @param string $name
     * @param LoyaltyProgram|null $loyaltyProgram
     */
    public function __construct(string $id, string $name, LoyaltyProgram $loyaltyProgram = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->loyaltyProgram = $loyaltyProgram;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return LoyaltyProgram|null
     */
    public function getLoyaltyProgram(): ?LoyaltyProgram
    {
        return $this->loyaltyProgram;
    }
}
