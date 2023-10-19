<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class Attribute
 * @package Piggy\Api\Models
 */
class ContactAttribute
{
    /** @var string */
    private $value;

    /** @var Attribute */
    private $attribute;

    public function __construct($value, $attribute)
    {
        $this->value = $value;
        $this->attribute = $attribute;
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
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return Attribute
     */
    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    /**
     * @param Attribute $attribute
     */
    public function setAttribute(Attribute $attribute): void
    {
        $this->attribute = $attribute;
    }

}