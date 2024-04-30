<?php

namespace Piggy\Api\Models\CustomAttributes;

class Group
{
    protected $id;

    protected $name;

    protected $position;

    protected $createdByUser;

    public function __construct(int $id, string $name, int $position, ?string $createdByUser)
    {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->createdByUser = $createdByUser;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getCreatedByUser(): ?string
    {
        return $this->createdByUser;
    }
}
