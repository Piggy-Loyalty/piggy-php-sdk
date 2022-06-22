<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class ContactIdentifier
 * @package Piggy\Api\Models
 */
class ContactIdentifier
{
    /** @var string */
    protected $value;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var Contact
     */
    protected $contact;

    public function __construct($name, $value, $active, ?Contact $contact)
    {
        $this->name = $name;
        $this->value = $value;
        $this->active = $active;
        $this->contact = $contact;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
    }
}
