<?php

namespace Piggy\Api\Tests\Factories;

use Piggy\Api\Models\Media;
use Piggy\Api\Models\Tier;

class TierFactory extends BaseFactory
{
    protected Tier $model;

    public function __construct(
        ?string $uuid = null,
        ?string $name = null,
        ?string $description = null,
        ?int $position = null,
        ?Media $media = null,
        ?array $perks = null
    ) {
        parent::__construct();

        $this->model = new Tier(
            uuid: $uuid ?? $this->faker->uuid(),
            name: $name ?? $this->faker->word(),
            description: $description ?? $this->faker->sentence(),
            position: $position ?? $this->faker->numberBetween(1, 10),
            media: $media ?? (new MediaFactory)->toModel(),
            perks: $perks ?? [(new PerkOptionFactory)->toModel()]
        );
    }
}
