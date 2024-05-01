<?php

namespace Piggy\Api\Models\Shops;

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
     * @var null|int
     */
    protected $id;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/shops';

    public function __construct(string $uuid, string $name, ?int $id)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->id = $id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
