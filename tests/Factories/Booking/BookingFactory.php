<?php

namespace Piggy\Api\Tests\Factories\Booking;

use DateTimeImmutable;
use Piggy\Api\Models\Booking\Booking;
use Piggy\Api\Models\Booking\Contact;
use Piggy\Api\Tests\Factories\BaseFactory;

class BookingFactory extends BaseFactory
{
    protected Booking $model;

    public function __construct(
        ?string $uuid = null,
        ?Contact $contact = null,
        ?DateTimeImmutable $startsAt = null,
        ?DateTimeImmutable $endsAt = null,
        ?DateTimeImmutable $checkedInAt = null,
        ?string $externalId = null,
        ?string $source = null,
        ?int $numberOfPeople = null,
        ?string $companyName = null,
        ?int $prepaidAmount = null
    ) {
        parent::__construct();

        $this->model = new Booking(
            uuid: $uuid ?? $this->faker->uuid(),
            contact: $contact ?? (new ContactFactory)->toModel(),
            startsAt: $startsAt ?? DateTimeImmutable::createFromMutable($this->faker->dateTime()),
            endsAt: $endsAt ?? DateTimeImmutable::createFromMutable($this->faker->dateTime()),
            checkedInAt: $checkedInAt ?? DateTimeImmutable::createFromMutable($this->faker->dateTime()),
            externalId: $externalId ?? $this->faker->word(),
            source: $source ?? $this->faker->word(),
            numberOfPeople: $numberOfPeople ?? $this->faker->numberBetween(1, 10),
            companyName: $companyName ?? $this->faker->company(),
            prepaidAmount: $prepaidAmount ?? $this->faker->numberBetween(1, 100)
        );
    }
}
