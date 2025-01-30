<?php

namespace Piggy\Api\Tests\Factories\BusinessProfile;

use Piggy\Api\Enums\BusinessProfileType;
use Piggy\Api\Models\BusinessProfile\BusinessProfile;
use Piggy\Api\Models\BusinessProfile\BusinessProfileAddress;
use Piggy\Api\Tests\Factories\BaseFactory;

class BusinessProfileFactory extends BaseFactory
{
    protected BusinessProfile $model;

    public function __construct(
        ?string $uuid = null,
        ?BusinessProfileType $type = null,
        ?string $name = null,
        ?string $reference = null,
        ?BusinessProfileAddress $address = null
    ) {
        parent::__construct();

        $this->model = new BusinessProfile(
            uuid: $uuid ?? $this->faker->uuid(),
            type: $type ?? $this->faker->randomElement(BusinessProfileType::class),
            name: $name ?? $this->faker->word(),
            reference: $reference ?? $this->faker->word(),
            address: $address ?? (new BusinessProfileAddressFactory)->toModel()
        );
    }
}
