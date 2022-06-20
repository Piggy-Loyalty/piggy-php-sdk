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
    protected $type;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $reference;

    /**
     * @var LoyaltyProgram|null $loyaltyProgram
     */
    protected $loyaltyProgram;

    /**
     * @param string $type
     * @param string $uuid
     * @param string $name
     * @param string|null $reference
     * @param LoyaltyProgram|null $loyaltyProgram
     */
    public function __construct(string $type, string $uuid, string $name, string $reference = null, LoyaltyProgram $loyaltyProgram = null)
    {
        $this->type = $type;
        $this->uuid = $uuid;
        $this->name = $name;
        $this->reference = $reference;
        $this->loyaltyProgram = $loyaltyProgram;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return LoyaltyProgram|null
     */
    public function getLoyaltyProgram(): ?LoyaltyProgram
    {
        return $this->loyaltyProgram;
    }
}
