<?php

namespace Piggy\Api\Tests\Factories\Contact;

use Piggy\Api\Models\Contact\ContactIdentifier;
use Piggy\Api\Tests\Factories\BaseFactory;

class ContactIdentifierFactory extends BaseFactory
{
    protected ContactIdentifier $model;

    public function __construct(
        ?string $name = null,
        ?string $value = null,
        ?bool $active = null,
        ?bool $default = null,
        ?string $contactUuid = null
    ) {
        parent::__construct();

        $this->model = new ContactIdentifier(
            name: $name ?? $this->faker->word(),
            value: $value ?? $this->faker->word(),
            active: $active ?? $this->faker->boolean(),
            default: $default ?? $this->faker->boolean(),
            contactUuid: $contactUuid ?? $this->faker->uuid()
        );
    }
}
