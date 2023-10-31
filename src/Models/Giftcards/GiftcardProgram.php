<?php

namespace Piggy\Api\Models\Giftcards;

use Piggy\Api\Models\Model;

/**
 * Class GiftcardProgram
 * @package Piggy\Api\Models\Giftcards
 */
class GiftcardProgram extends Model
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $active;

//
//    /**
//     * GiftcardProgram constructor.
//     * @param string $uuid
//     * @param string $name
//     * @param bool $active
//     */
//    public function __construct(string $uuid, string $name, bool $active)
//    {
//        $this->uuid = $uuid;
//        $this->name = $name;
//        $this->active = $active;
//    }

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