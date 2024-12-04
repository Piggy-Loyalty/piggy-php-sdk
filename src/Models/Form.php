<?php

namespace Piggy\Api\Models;

use Piggy\Api\Enums\FormStatus;
use Piggy\Api\Enums\FormType;

class Form
{
    protected ?string $uuid;

    protected string $name;

    protected ?FormStatus $status;

    protected FormType $type;

    protected string $url;

    public function __construct(
        ?string $uuid,
        string $name,
        ?FormStatus $status,
        FormType $type,
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

    public function getStatus(): ?FormStatus
    {
        return $this->status;
    }

    public function getType(): FormType
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
