<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class SubscriptionType
 * @package Piggy\Api\Models
 */
class SubscriptionType
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var string
     */
    protected $strategy;

    public function __construct($id, $name, $description, $active, $strategy)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->active = $active;
        $this->strategy = $strategy;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
     * @return string
     */
    public function getStrategy(): string
    {
        return $this->strategy;
    }

    /**
     * @param string $strategy
     */
    public function setStrategy(string $strategy): void
    {
        $this->strategy = $strategy;
    }
}
