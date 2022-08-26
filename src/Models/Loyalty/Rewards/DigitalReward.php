<?php

namespace Piggy\Api\Models\Loyalty\Rewards;

use Piggy\Api\Models\Loyalty\Media;

/**
 * Class DigitalReward
 * @package Piggy\Api\Models\Loyalty\Rewards
 */
class DigitalReward extends Reward
{

    public function __construct(string $uuid, ?string $title = "", ?int $requiredCredits = null, ?Media $media = null, ?string $description = "", ?bool $active = true, ?string $rewardType = null, array $attributes = [])
    {
        parent::__construct($uuid, $title, $requiredCredits, $media, $description, $active, $rewardType, $attributes);
    }

}