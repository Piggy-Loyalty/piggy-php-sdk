<?php

namespace Piggy\Api\Tests\Factories\BusinessProfile;

use Piggy\Api\Models\BusinessProfile\BusinessProfileAddress;
use Piggy\Api\Tests\Factories\BaseFactory;

class BusinessProfileAddressFactory extends BaseFactory
{
    protected BusinessProfileAddress $model;

    public function __construct(
        ?string $houseNumber = null,
        ?string $postalCode = null
    ) {
        parent::__construct();

        $this->model = new BusinessProfileAddress(
            houseNumber: $houseNumber ?? $this->faker->randomNumber(),
            postalCode: $postalCode ?? $this->faker->postcode()
        );
    }
}
