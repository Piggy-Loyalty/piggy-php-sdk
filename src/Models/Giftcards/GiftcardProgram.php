<?php

namespace Piggy\Api\Models\Giftcards;

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

    const resourceUri = '/api/v3/oauth/clients/giftcard-programs';

    /**
     * GiftcardProgram constructor.
     */
    public function __construct(string $uuid, string $name, bool $active)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->active = $active;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
