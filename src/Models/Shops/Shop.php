<?php

namespace Piggy\Api\Models\Shops;

/**
 * Class Shop
 * @package Piggy\Api\Models\Shops
 */
class Shop
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
     * @var string
     */
    protected $id;

    /**
     * @param string $uuid
     * @param string $name
     * @param string | null $id
     */
    public function __construct(string $uuid, string $name, ?string $id = null)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->id = $id;

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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }




}
