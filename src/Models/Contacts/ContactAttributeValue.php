<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class ContactAttributeValue
 * @package Piggy\Api\Models
 */
class ContactAttributeValue
{
    /** @var string */
    protected $value;

    /** @var string */
    protected $name;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return void
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
