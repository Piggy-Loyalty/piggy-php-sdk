<?php

namespace Piggy\Api\Models\Vouchers;

class Promotion
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int|null
     */
    protected $voucher_limit;

    /**
     * @var int|null
     */
    protected $limit_per_contact;

    /**
     * @var int|null
     */
    protected $expiration_duration;

    /**
     * @var mixed[]
     */
    protected $attributes;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/promotions';

    /**
     * @param  mixed[]  $attributes
     */
    public function __construct(
        string $uuid,
        string $name,
        string $description,
        ?int $voucher_limit = null,
        ?int $limit_per_contact = null,
        ?int $expiration_duration = null,
        array $attributes = []
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->voucher_limit = $voucher_limit;
        $this->limit_per_contact = $limit_per_contact;
        $this->expiration_duration = $expiration_duration;
        $this->attributes = $attributes;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getVoucherLimit(): ?int
    {
        return $this->voucher_limit;
    }

    public function getLimitPerContact(): ?int
    {
        return $this->limit_per_contact;
    }

    public function getExpirationDuration(): ?int
    {
        return $this->expiration_duration;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return mixed[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
