<?php

namespace Piggy\Api\Models\Giftcards;

/**
 * Class GiftcardProgram
 * @package Piggy\Api\Models\Giftcards
 */
class GiftcardProgram
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $active;

    /**
     * GiftcardProgram constructor.
     * @param string $uuid
     * @param string $name
     * @param bool $active
     */
    public function __construct(string $uuid, string $name, bool $active)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}