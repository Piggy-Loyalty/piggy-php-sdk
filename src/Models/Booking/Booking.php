<?php

namespace Piggy\Api\Models\Booking;

use DateTimeImmutable;
use Piggy\Api\Models\BaseModel;

readonly class Booking extends BaseModel
{
    protected Contact $contact;

    protected ?DateTimeImmutable $startsAt;

    protected ?DateTimeImmutable $endsAt;

    protected ?DateTimeImmutable $checkedInAt;

    protected ?string $externalId;

    protected ?string $source;

    protected ?int $numberOfPeople;

    protected ?string $companyName;

    protected ?int $prepaidAmount;

    public function __construct(
        Contact $contact,
        ?DateTimeImmutable $startsAt,
        ?DateTimeImmutable $endsAt,
        ?DateTimeImmutable $checkedInAt,
        ?string $externalId,
        ?string $source,
        ?int $numberOfPeople,
        ?string $companyName,
        ?int $prepaidAmount
    ) {
        $this->contact = $contact;
        $this->startsAt = $startsAt;
        $this->endsAt = $endsAt;
        $this->checkedInAt = $checkedInAt;
        $this->externalId = $externalId;
        $this->source = $source;
        $this->numberOfPeople = $numberOfPeople;
        $this->companyName = $companyName;
        $this->prepaidAmount = $prepaidAmount;
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
