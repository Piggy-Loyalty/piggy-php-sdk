<?php

namespace Piggy\Api\Tests\Factories;

use Piggy\Api\Models\Perk\Perk;

class PerkFactory extends BaseFactory
{
    protected Perk $model;

    public function __construct(
        ?string $uuid = null,
        ?string $label = null,
        ?string $name = null
    ) {
        parent::__construct();

        $this->model = new Perk(
            uuid: $uuid ?? $this->faker->uuid(),
            label: $label ?? $this->faker->word(),
            name: $name ?? $this->faker->word()
        );
    }
}
