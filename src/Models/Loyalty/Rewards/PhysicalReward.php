<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use DateTime;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Loyalty\Media;

/**
 * Class PhysicalReward
 */
class PhysicalReward extends Reward
{
    public function __construct(string $uuid, ?string $title = '', ?int $requiredCredits = null, ?Media $media = null, ?string $description = '', ?bool $active = true, ?string $rewardType = null, array $attributes = [], ?Contact $contact = null, ?DateTime $expiresAt = null, ?bool $hasBeenCollected = false)
    {
        parent::__construct($uuid, $title, $requiredCredits, $media, $description, $active, $rewardType, $attributes, $contact, $expiresAt, $hasBeenCollected);
    }
}
