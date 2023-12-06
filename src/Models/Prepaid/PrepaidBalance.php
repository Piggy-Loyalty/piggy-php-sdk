<?php

namespace Piggy\Api\Models\Prepaid;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Prepaid\PrepaidBalanceMapper;

/**
 * Class PrepaidBalance
 * @package Piggy\Api\Models
 */
class PrepaidBalance
{
    /**
     * @var int
     */
    protected $balanceInCents;

    protected static $contactsResourceUri = "/api/v3/oauth/clients/contacts";

    /**
     * @param int $balanceInCents
     */
    public function __construct(int $balanceInCents)
    {
        $this->balanceInCents = $balanceInCents;
    }

    /**
     * @return int
     */
    public function getBalanceInCents(): int
    {
        return $this->balanceInCents;
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return PrepaidBalance
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function findBy(string $contactUuid, array $params = []): PrepaidBalance
    {
        $response = ApiClient::get(self::$contactsResourceUri . "/$contactUuid/prepaid-balance", $params);

        return PrepaidBalanceMapper::map($response->getData());
    }
}
