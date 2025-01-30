<?php

namespace Piggy\Api\Tests\Factories;

use Piggy\Api\Models\Media;

class MediaFactory extends BaseFactory
{
    protected Media $model;

    public function __construct(
        ?string $id = null,
        ?string $type = null,
        ?string $value = null
    ) {
        parent::__construct();

        $this->model = new Media(
            id: $id ?? $this->faker->uuid(),
            type: $type ?? $this->faker->word(),
            value: $value ?? $this->faker->word()
        );
    }
}
