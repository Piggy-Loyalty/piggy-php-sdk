<?php

namespace Piggy\Api\Tests\Factories\Contact;

use DateTimeImmutable;
use Piggy\Api\Models\Contact\CollectableReward;
use Piggy\Api\Models\Contact\Reward;
use Piggy\Api\Tests\Factories\BaseFactory;

class CollectableRewardFactory extends BaseFactory
{
    protected CollectableReward $model;

    public function __construct(
        ?string $uuid = null,
        ?string $title = null,
        ?Reward $reward = null,
        ?DateTimeImmutable $expiresAt = null,
        ?bool $hasBeenCollected = null,
        ?DateTimeImmutable $createdAt = null
    ) {
        parent::__construct();

        $this->model = new CollectableReward(
            uuid: $uuid ?? $this->faker->uuid(),
            title: $title ?? $this->faker->word(),
            reward: $reward ?? (new RewardFactory)->toModel(),
            expiresAt: $expiresAt ?? DateTimeImmutable::createFromMutable($this->faker->dateTime()),
            hasBeenCollected: $hasBeenCollected ?? $this->faker->boolean(),
            createdAt: $createdAt ?? DateTimeImmutable::createFromMutable($this->faker->dateTime())
        );
    }
}
