<?php

namespace Piggy\Api\Models\Vouchers;

class Lock
{
    /**
     * @var string
     */
    protected $release_key;

    /**
     * @var string
     */
    protected $locked_at;

    /**
     * @var string|null
     */
    protected $unlocked_at;

    /**
     * @var string|null
     */
    protected $system_release_at;

    public function __construct(
        string $release_key,
        string $locked_at,
        ?string $unlocked_at = null,
        ?string $system_release_at = null
    ) {
        $this->release_key = $release_key;
        $this->locked_at = $locked_at;
        $this->unlocked_at = $unlocked_at;
        $this->system_release_at = $system_release_at;
    }

    public function getReleaseKey(): string
    {
        return $this->release_key;
    }

    public function getLockedAt(): string
    {
        return $this->locked_at;
    }

    public function getUnlockedAt(): ?string
    {
        return $this->unlocked_at;
    }

    public function getSystemReleaseAt(): ?string
    {
        return $this->system_release_at;
    }
}