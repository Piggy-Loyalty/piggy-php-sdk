<?php

namespace Piggy\Api\Models\ApiKeys;

class ApiKey
{
    protected $id;

    protected $apiKey;

    protected $active;

    public function __construct(int $id, string $apiKey, bool $active)
    {
        $this->id = $id;
        $this->apiKey = $apiKey;
        $this->active = $active;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getActive(): bool
    {
        return $this->active;
    }
}