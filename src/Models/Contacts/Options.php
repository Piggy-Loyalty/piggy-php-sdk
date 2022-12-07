<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class Options
 * @package Piggy\Api\Models
 */
class Options
{
    /**
     * @var string|null
     */
    protected $label;

    /**
     * @var int|null
     */
    protected $value;

    public function __construct(?string $label, ?string $value)
    {
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return void
     */
    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setValue(?int $value): void
    {
        $this->value = $value;
    }

    //todo ask stefan if we really need the setters for our sdk

}