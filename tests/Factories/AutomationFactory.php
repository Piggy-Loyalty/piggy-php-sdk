<?php

namespace Piggy\Api\Tests\Factories;

use DateTimeImmutable;
use Piggy\Api\Enums\AutomationEventType;
use Piggy\Api\Enums\AutomationStatus;
use Piggy\Api\Models\Automation;

class AutomationFactory extends BaseFactory
{
    protected Automation $model;

    public function __construct(
        ?string $uuid = null,
        ?string $name = null,
        ?AutomationStatus $status = null,
        ?AutomationEventType $event = null,
        ?DateTimeImmutable $createdAt = null,
        ?DateTimeImmutable $updatedAt = null
    ) {
        parent::__construct();

        $this->model = new Automation(
            uuid: $uuid ?? $this->faker->uuid(),
            name: $name ?? $this->faker->word(),
            status: $status ?? $this->faker->randomElement(AutomationStatus::class),
            event: $event ?? $this->faker->randomElement(AutomationEventType::class),
            createdAt: $createdAt ?? DateTimeImmutable::createFromMutable($this->faker->dateTime()),
            updatedAt: $updatedAt ?? DateTimeImmutable::createFromMutable($this->faker->dateTime())
        );
    }
}
