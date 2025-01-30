<?php

namespace Piggy\Api\Tests\Factories\Referral;

use Piggy\Api\Enums\ReferralStatus;
use Piggy\Api\Models\Referral\Contact;
use Piggy\Api\Models\Referral\Referral;
use Piggy\Api\Tests\Factories\BaseFactory;

class ReferralFactory extends BaseFactory
{
    protected Referral $model;

    public function __construct(
        ?string $uuid = null,
        ?ReferralStatus $status = null,
        ?Contact $referringContact = null,
        ?Contact $referredContact = null
    ) {
        parent::__construct();

        $this->model = new Referral(
            uuid: $uuid ?? $this->faker->uuid(),
            status: $status ?? $this->faker->randomElement(ReferralStatus::class),
            referringContact: $referringContact ?? (new ContactFactory)->toModel(),
            referredContact: $referredContact ?? (new ContactFactory)->toModel()
        );
    }
}
