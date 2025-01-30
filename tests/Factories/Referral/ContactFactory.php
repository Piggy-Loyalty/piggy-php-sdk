<?php

namespace Piggy\Api\Tests\Factories\Referral;

use Piggy\Api\Models\Referral\Contact;
use Piggy\Api\Tests\Factories\BaseFactory;

class ContactFactory extends BaseFactory
{
    protected Contact $model;

    public function __construct(
        ?string $uuid = null,
        ?string $email = null
    ) {
        parent::__construct();

        $this->model = new Contact(
            uuid: $uuid ?? $this->faker->uuid(),
            email: $email ?? $this->faker->email()
        );
    }
}
