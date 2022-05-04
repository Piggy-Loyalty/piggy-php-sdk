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

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}
