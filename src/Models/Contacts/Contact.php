<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class Contact
 * @package Piggy\Api\Models
 */
class Contact
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

}
