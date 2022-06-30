<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Media;

class Reward
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var int|null
     */
    protected $requiredCredits;

    /**
     * @var Media|null
     */
    protected $media;

    /**
     * @var bool|null
     */
    protected $active;

    /**
     * @param string $uuid
     * @param string|null $title
     * @param int|null $requiredCredits
     * @param Media|null $media
     * @param string|null $description
     * @param bool|null $active
     */
    public function __construct(string $uuid, ?string $title = '', ?int $requiredCredits = null, ?Media $media = null, ?string $description = "", ?bool $active = true)
    {
        $this->uuid = $uuid;
        $this->title = $title;
        $this->description = $description;
        $this->requiredCredits = $requiredCredits;
        $this->media = $media;
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return int|null
     */
    public function getRequiredCredits(): ?int
    {
        return $this->requiredCredits;
    }

    /**
     * @param int $requiredCredits
     * @return void
     */
    public function setRequiredCredits(int $requiredCredits): void
    {
        $this->requiredCredits = $requiredCredits;
    }

    /**
     * @return Media|null
     */
    public function getMedia(): ?Media
    {
        return $this->getMedia();
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }
}