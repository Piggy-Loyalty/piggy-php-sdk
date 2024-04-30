<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class ContactIdentifier
 */
class ContactIdentifier
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var Contact|null
     */
    protected $contact;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/contact-identifiers';

    public function __construct(string $value, bool $active, ?string $name = '', ?Contact $contact = null)
    {
        $this->value = $value;
        $this->name = $name;
        $this->active = $active;
        $this->contact = $contact;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }
}
