<?php

namespace Piggy\Api\Models\Tiers;

class Tier
{
    /**
     * @var string|null
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var mixed[]|null
     */
    protected $media;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/tiers';

    /**
     * @var string
     */
    const contactsResourceUri = '/api/v3/oauth/clients/contacts';

    /**
     * @param  mixed[]|null  $media
     */
    public function __construct(
        string $name,
        int $position,
        ?string $uuid = null,
        ?string $description = null,
        ?array $media = null
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->media = $media;
        $this->position = $position;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return mixed[]|null
     */
    public function getMedia(): ?array
    {
        return $this->media;
    }

    public function getPosition(): int
    {
        return $this->position;
    }
}
