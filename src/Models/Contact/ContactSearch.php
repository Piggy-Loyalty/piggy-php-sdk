<?php

namespace Piggy\Api\Models\Contact;

use DateTimeImmutable;
use Piggy\Api\Enums\Channel;
use Piggy\Api\Enums\ContactStatus;
use Piggy\Api\Models\BaseModel;

readonly class ContactSearch extends BaseModel
{
    public function __construct(
        public int $id,
        public ?string $uuid,
        public ?string $email,
        public ?int $contactId,
        public ?int $currentTier,
        public ?string $avatar,
        public ?string $firstName,
        public ?string $lastName,
        public ?string $address,
        public ?string $phoneNumber,
        public ?DateTimeImmutable $birthdate,
        public Channel|int|null $channel,
        public ?int $age,
        public ?string $locale,
        public ?ContactStatus $status,
        public ?DateTimeImmutable $updatedAt,
        public ?DateTimeImmutable $createdAt,
        public ?bool $isAnonymous,
        public ?int $creditBalance,
        public ?int $prepaidBalance,
        public ?array $loyaltyAssociatedShops,
        public ?int $loyaltyTotalPurchaseAmount,
        public ?int $previousLoyaltyBalance,
        public ?DateTimeImmutable $loyaltyFirstTransactionDate,
        public ?DateTimeImmutable $loyaltyLastTransactionDate,
        public ?int $loyaltyNumberOfTransactions,
        public ?int $loyaltyTotalCreditsReceived,
        public ?string $defaultContactIdentifier,
        public ?string $tier,
        public ?array $presentInImports,
        public ?array $listMemberships,
    ) {
        //
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    public function getCurrentTier(): ?int
    {
        return $this->currentTier;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getBirthdate(): ?DateTimeImmutable
    {
        return $this->birthdate;
    }

    public function getChannel(): Channel|int|null
    {
        return $this->channel;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function getStatus(): ?ContactStatus
    {
        return $this->status;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function isAnonymous(): ?bool
    {
        return $this->isAnonymous;
    }

    public function getCreditBalance(): ?int
    {
        return $this->creditBalance;
    }

    public function getPrepaidBalance(): ?int
    {
        return $this->prepaidBalance;
    }

    public function getLoyaltyAssociatedShops(): ?array
    {
        return $this->loyaltyAssociatedShops;
    }

    public function getLoyaltyTotalPurchaseAmount(): ?int
    {
        return $this->loyaltyTotalPurchaseAmount;
    }

    public function getPreviousLoyaltyBalance(): ?int
    {
        return $this->previousLoyaltyBalance;
    }

    public function getLoyaltyFirstTransactionDate(): ?DateTimeImmutable
    {
        return $this->loyaltyFirstTransactionDate;
    }

    public function getLoyaltyLastTransactionDate(): ?DateTimeImmutable
    {
        return $this->loyaltyLastTransactionDate;
    }

    public function getLoyaltyNumberOfTransactions(): ?int
    {
        return $this->loyaltyNumberOfTransactions;
    }

    public function getLoyaltyTotalCreditsReceived(): ?int
    {
        return $this->loyaltyTotalCreditsReceived;
    }

    public function getDefaultContactIdentifier(): ?string
    {
        return $this->defaultContactIdentifier;
    }

    public function getTier(): ?string
    {
        return $this->tier;
    }

    public function getPresentInImports(): ?array
    {
        return $this->presentInImports;
    }

    public function getListMemberships(): ?array
    {
        return $this->listMemberships;
    }
}
