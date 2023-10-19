<?php

namespace Piggy\Api\Models\Vouchers;

use Piggy\Api\Models\Contacts\Contact;

class Voucher
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $expiration_date;

    /**
     * @var string
     */
    protected $activation_date;

    /**
     * @var ?DateTime
     */
    protected $redeemed_at;

    /**
     * @var bool
     */
    protected $is_redeemed;

    /**
     * @var Promotion
     */
    protected $promotion;

    /**
     * @var Contact|null
     */
    protected $contact;

    public function __construct(
        string    $uuid,
        string    $status,
        ?string    $code,
        ?string    $name,
        ?string    $description,
        ?Promotion $promotion,
        ?Contact   $contact,
        ?string   $redeemedAt,
        ?bool     $isRedeemed,
        ?string   $activationDate,
        ?string   $expirationDate
    )
    {
        $this->uuid = $uuid;
        $this->code = $code;
        $this->name = $name;
        $this->status = $status;
        $this->description = $description;
        $this->promotion = $promotion;
        $this->contact = $contact;
        $this->redeemed_at = $redeemedAt;
        $this->is_redeemed = $isRedeemed;
        $this->activation_date = $activationDate;
        $this->expiration_date = $expirationDate;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function getExpirationDate(): ?string
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(string $expiration_date): void
    {
        $this->expiration_date = $expiration_date;
    }

    public function getActivationDate(): ?string
    {
        return $this->activation_date;
    }

    public function setActivationDate(string $activation_date): void
    {
        $this->activation_date = $activation_date;
    }

    public function getRedeemedAt(): ?string
    {
        return $this->redeemed_at;
    }

    public function setRedeemedAt(?string $redeemed_at): void
    {
        $this->redeemed_at = $redeemed_at;
    }

    public function isRedeemed(): ?bool
    {
        return $this->is_redeemed;
    }

    public function setIsRedeemed(bool $is_redeemed): void
    {
        $this->is_redeemed = $is_redeemed;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

}
