<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class ContactIdentifier
 * @package Piggy\Api\Models
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
     * @var bool
     */
    protected $active;

    public function __construct(string $value, bool $active, ?string $name = '')
    {
        $this->value = $value;
        $this->name = $name;
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }
}
