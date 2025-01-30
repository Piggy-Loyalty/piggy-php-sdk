<?php

namespace Piggy\Api\Tests\Factories;

use Piggy\Api\Enums\FormStatus;
use Piggy\Api\Enums\FormType;
use Piggy\Api\Models\Form;

class FormFactory extends BaseFactory
{
    protected Form $model;

    public function __construct(
        protected ?string $uuid = null,
        protected ?string $name = null,
        protected ?FormStatus $status = null,
        protected ?FormType $type = null,
        protected ?string $url = null
    ) {
        parent::__construct();

        $this->model = new Form(
            uuid: $uuid ?? $this->faker->uuid(),
            name: $name ?? $this->faker->word(),
            status: $status ?? $this->faker->randomElement(FormStatus::class),
            type: $type ?? $this->faker->randomElement(FormType::class),
            url: $url ?? $this->faker->url()
        );
    }
}
