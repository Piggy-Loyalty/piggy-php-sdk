<?php

namespace Piggy\Api\Tests\Factories\Contact;

use Piggy\Api\Enums\RewardType;
use Piggy\Api\Models\Contact\Reward;
use Piggy\Api\Models\Media;
use Piggy\Api\Tests\Factories\BaseFactory;
use Piggy\Api\Tests\Factories\MediaFactory;

class RewardFactory extends BaseFactory
{
    protected Reward $model;

    public function __construct(
        ?string $uuid = null,
        ?string $title = null,
        ?RewardType $type = null,
        ?bool $active = null,
        ?string $description = null,
        ?int $requiredCredits = null,
        ?Media $media = null,
        ?float $costPrice = null,
        ?int $stock = null,
        ?bool $preRedeemable = null,
        ?int $expirationDuration = null,
        ?array $customAttributes = null
    ) {
        parent::__construct();

        $this->model = new Reward(
            uuid: $uuid ?? $this->faker->uuid(),
            title: $title ?? $this->faker->word(),
            type: $type ?? $this->faker->randomElement(RewardType::class),
            active: $active ?? $this->faker->boolean(),
            description: $description ?? $this->faker->sentence(),
            requiredCredits: $requiredCredits ?? $this->faker->numberBetween(1, 100),
            media: $media ?? (new MediaFactory)->toModel(),
            costPrice: $costPrice ?? $this->faker->randomFloat(2, 1, 100),
            stock: $stock ?? $this->faker->numberBetween(1, 100),
            preRedeemable: $preRedeemable ?? $this->faker->boolean(),
            expirationDuration: $expirationDuration ?? $this->faker->numberBetween(1, 100),
            customAttributes: $customAttributes ?? $this->faker->words()
        );
    }
}
