<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
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
     * @var string
     */
    protected $rewardType;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var DateTime
     */
    protected $expiresAt;

    /**
     * @var bool|null
     */
    protected $hasBeenCollected;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/rewards';

    public function __construct(string $uuid, ?string $title = '', ?int $requiredCredits = null, ?Media $media = null, ?string $description = '', ?bool $active = true, ?string $rewardType = null, array $attributes = [], ?Contact $contact = null, ?DateTime $expiresAt = null, ?bool $hasBeenCollected = false)
    {
        $this->uuid = $uuid;
        $this->title = $title;
        $this->description = $description;
        $this->requiredCredits = $requiredCredits;
        $this->media = $media;
        $this->active = $active;
        $this->rewardType = $rewardType;
        $this->attributes = $attributes;
        $this->contact = $contact;
        $this->expiresAt = $expiresAt;
        $this->hasBeenCollected = $hasBeenCollected;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getRequiredCredits(): ?int
    {
        return $this->requiredCredits;
    }

    public function setRequiredCredits(int $requiredCredits): void
    {
        $this->requiredCredits = $requiredCredits;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function getRewardType(): ?string
    {
        return $this->rewardType;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return void
     */
    public function setAttribute(string $name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }
}
