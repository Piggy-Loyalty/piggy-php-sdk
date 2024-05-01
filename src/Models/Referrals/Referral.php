<?php

namespace Piggy\Api\Models\Referrals;

class Referral
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var object
     */
    protected $referring_contact;

    /**
     * @var object
     */
    protected $referred_contact;

    /**
     * TODO: Refactor to enum
     *
     * @var string
     */
    protected $status;

    const resourceUri = '/api/v3/oauth/clients/referrals';

    public function __construct(string $uuid, object $referredContact, object $referringContact, string $status)
    {
        $this->uuid = $uuid;
        $this->referring_contact = $referringContact;
        $this->referred_contact = $referredContact;
        $this->status = $status;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getReferringContact(): object
    {
        return $this->referring_contact;
    }

    public function getReferredContact(): object
    {
        return $this->referred_contact;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
