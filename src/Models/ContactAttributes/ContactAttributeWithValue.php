<?php

namespace Piggy\Api\Models\ContactAttributes;

/**
 * Class ContactAttribute
 * @package Piggy\Api\Models
 */
class ContactAttributeWithValue
{
    /** @var string */
    public $value;

    /**
     * @var ContactAttribute
     */
    public $contactAttribute;

    public function __construct($value, $contactAttribute)
    {
        $this->value = $value;
        $this->contactAttribute = $contactAttribute;
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
     * @return ContactAttribute
     */
    public function getContactAttribute(): ContactAttribute
    {
        return $this->contactAttribute;
    }

    /**
     * @param ContactAttribute $contactAttribute
     */
    public function setContactAttribute(ContactAttribute $contactAttribute): void
    {
        $this->contactAttribute = $contactAttribute;
    }

}