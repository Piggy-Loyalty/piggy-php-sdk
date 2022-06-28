<?php

namespace Piggy\Api\Models\Loyalty;

/**
 * Class LoyaltyProgram
 * @package Piggy\Api\Models\Loyalty
 */
class Unit
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
