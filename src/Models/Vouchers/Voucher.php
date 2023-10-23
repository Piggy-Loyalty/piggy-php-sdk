<?php

namespace Piggy\Api\Models\Vouchers;

use Piggy\Api\Models\Contacts\Contact;

use DateTime;

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
     * @var DateTime
     */
    protected $expiration_date;

    /**
     * @var DateTime|null
     */
    protected $activation_date;

    /**
     * @var DateTime|null
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
        ?DateTime   $redeemedAt,
        ?bool     $isRedeemed,
        ?DateTime   $activationDate,
        ?DateTime   $expirationDate
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function getExpirationDate(): ?DateTime
    {
        return $this->expiration_date;
    }

    public function getActivationDate(): ?DateTime
    {
        return $this->activation_date;
    }

    public function getRedeemedAt(): ?DateTime
    {
        return $this->redeemed_at;
    }

    public function isRedeemed(): ?bool
    {
        return $this->is_redeemed;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }
}
