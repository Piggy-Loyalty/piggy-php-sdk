<?php

namespace Piggy\Api\Tests\Factories;

use Piggy\Api\Models\Perk\Perk;
use Piggy\Api\Models\Perk\PerkOption;

class PerkOptionFactory extends BaseFactory
{
    protected PerkOption $model;

    public function __construct(
        ?string $label = null,
        ?string $value = null,
        ?bool $default = null,
        ?Perk $perk = null
    ) {
        parent::__construct();

        $this->model = new PerkOption(
            label: $label ?? $this->faker->word(),
            value: $value ?? $this->faker->word(),
            default: $default ?? $this->faker->boolean(),
            perk: $perk ?? (new PerkFactory)->toModel()
        );
    }
}
