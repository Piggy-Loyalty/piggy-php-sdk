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
     * @var string|null
     */
    protected $label;

    /** @var bool|null */
    protected $isDefault;

    /**
     * @param string $name
     * @param string|null $label
     * @param bool|null $isDefault
     */
    public function __construct(string $name, ?string $label, ?bool $isDefault)
    {
        $this->name = $name;
        $this->label = $label;
        $this->isDefault = $isDefault;
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
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /** @return bool| null */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }
}
