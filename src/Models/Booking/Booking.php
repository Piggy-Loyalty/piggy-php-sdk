<?php

namespace Piggy\Api\Models\Booking;

use DateTimeImmutable;
use Piggy\Api\Models\BaseModel;

readonly class Booking extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public Contact $contact,
        public ?DateTimeImmutable $startsAt,
        public ?DateTimeImmutable $endsAt,
        public ?DateTimeImmutable $checkedInAt,
        public ?string $externalId,
        public ?string $source,
        public ?int $numberOfPeople,
        public ?string $companyName,
        public ?int $prepaidAmount
    ) {
        //
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function getStartsAt(): ?DateTimeImmutable
    {
        return $this->startsAt;
    }

    public function getEndsAt(): ?DateTimeImmutable
    {
        return $this->endsAt;
    }

    public function getCheckedInAt(): ?DateTimeImmutable
    {
        return $this->checkedInAt;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function getNumberOfPeople(): ?int
    {
        return $this->numberOfPeople;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function getPrepaidAmount(): ?int
    {
        return $this->prepaidAmount;
    }
}
