<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class ContactAttribute
 */
class ContactAttribute
{
    /** @var string */
    protected $value;

    /** @var Attribute */
    protected $attribute;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/contact-attributes';

    public function __construct($value, $attribute)
    {
        $this->value = $value;
        $this->attribute = $attribute;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(Attribute $attribute): void
    {
        $this->attribute = $attribute;
    }
}
