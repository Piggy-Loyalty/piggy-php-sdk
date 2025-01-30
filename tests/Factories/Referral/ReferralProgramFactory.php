<?php

namespace Piggy\Api\Tests\Factories\Referral;

use Piggy\Api\Enums\CompletionEvent;
use Piggy\Api\Models\Referral\ReferralIncentive;
use Piggy\Api\Models\Referral\ReferralProgram;
use Piggy\Api\Tests\Factories\BaseFactory;

class ReferralProgramFactory extends BaseFactory
{
    protected ReferralProgram $model;

    public function __construct(
        ?CompletionEvent $completionEvent = null,
        ?int $limitPerContact = null,
        ?ReferralIncentive $referredContactIncentive = null,
        ?ReferralIncentive $referringContactIncentive = null
    ) {
        parent::__construct();

        $this->model = new ReferralProgram(
            completionEvent: $completionEvent ?? $this->faker->randomElement(CompletionEvent::class),
            limitPerContact: $limitPerContact ?? $this->faker->boolean()
                ? $this->faker->numberBetween(1, 10)
                : null,
            referredContactIncentive: $referredContactIncentive ?? (new ReferralIncentiveFactory)->toModel(),
            referringContactIncentive: $referringContactIncentive ?? (new ReferralIncentiveFactory)->toModel()
        );
    }
}
