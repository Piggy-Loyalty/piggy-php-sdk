<?php

namespace Piggy\Api\Tests\Factories\Referral;

use Piggy\Api\Enums\IncentiveTargetType;
use Piggy\Api\Enums\IncentiveType;
use Piggy\Api\Models\Referral\ReferralIncentive;
use Piggy\Api\Tests\Factories\BaseFactory;

class ReferralIncentiveFactory extends BaseFactory
{
    protected ReferralIncentive $model;

    public function __construct(
        ?IncentiveTargetType $incentiveTargetType = null,
        ?IncentiveType $incentiveType = null,
        ?array $data = null
    ) {
        parent::__construct();

        $this->model = new ReferralIncentive(
            incentiveTargetType: $incentiveTargetType ?? $this->faker->randomElement(IncentiveTargetType::class),
            incentiveType: $incentiveType ?? $this->faker->randomElement(IncentiveType::class),
            data: $data ?? $this->faker->words()
        );
    }
}
