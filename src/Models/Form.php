<?php

namespace Piggy\Api\Models;

class Form
{
    protected ?string $uuid;

    protected string $name;

    protected ?string $status;

    protected string $type;

    protected string $url;

    public function __construct(
        ?string $uuid,
        string $name,
        ?string $status,
        string $type,
        string $url
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->status = $status;
        $this->type = $type;
        $this->url = $url;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
