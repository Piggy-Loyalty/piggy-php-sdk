<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Media;

class DigitalReward extends Reward
{
    /**
     * @var array|null
     */
    protected $meta;

    public function __construct(string $uuid, ?string $title = '', ?int $requiredCredits = null, ?Media $media = null, ?string $description = "", array $meta = null)
    {
        parent::__construct($uuid, $title, $requiredCredits, $media, $description);

        $this->meta = $meta;
    }

    /**
     * @return array|null
     */
    public function getMeta(): ?array
    {
        return $this->meta;
    }

    /**
     * @param array|null $meta
     */
    public function setMeta(?array $meta): void
    {
        $this->meta = $meta;
    }
}