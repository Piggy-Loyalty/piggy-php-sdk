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
     * @var string|null
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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return void
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }


}