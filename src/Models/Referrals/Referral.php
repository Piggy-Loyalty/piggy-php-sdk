<?php

namespace Piggy\Api\Models\Referrals;

use Piggy\Api\ApiClient;
use Piggy\Api\StaticMappers\Referrals\ReferralsMapper;

class Referral
{

    protected $uuid;

    protected $referring_contact;

    protected $referred_contact;

    protected $status;

    protected static $resourceUri = "/api/v3/oauth/clients/referrals";

    public function __construct($uuid, $referredContact, $referringContact, $status)
    {
        $this->uuid = $uuid;
        $this->referring_contact = $referringContact;
        $this->referred_contact = $referredContact;
        $this->status = $status;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getReferringContact()
    {
        return $this->referring_contact;
    }

    public function getReferredContact()
    {
        return $this->referred_contact;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::$resourceUri, $params);

        return ReferralsMapper::map($response->getData());
    }
}