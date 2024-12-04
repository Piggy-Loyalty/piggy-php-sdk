<?php

namespace Piggy\Api\Models;

use Piggy\Api\Enums\FormStatus;
use Piggy\Api\Enums\FormType;

readonly class Form extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public string $name,
        public ?FormStatus $status,
        public FormType $type,
        public string $url
    ) {
        //
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
