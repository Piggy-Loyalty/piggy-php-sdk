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
     * @var string
     */
    protected $label;

    /**
     * @param string $name
     * @param string $label
     */
    public function __construct(string $name, string $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }
}
