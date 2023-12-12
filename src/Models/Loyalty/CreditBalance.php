<?php

namespace Piggy\Api\Models\Loyalty;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Loyalty\CreditBalanceMapper;

/**
 * Class CreditBalance
 * @package Piggy\Api\Models
 */
class CreditBalance
{
    /**
     * @var int
     */
    protected $balance;

    /**
     * @var string
     */
    const contactsResourceUri = "/api/v3/oauth/clients/contacts";

    /**
     * @param int $balance
     */
    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param string $contactUuid
     * @param array $params
     * @return CreditBalance
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function findBy(string $contactUuid, array $params = []): CreditBalance
    {
        $response = ApiClient::get(self::contactsResourceUri . "/$contactUuid/credit-balance", $params);

        return CreditBalanceMapper::map($response->getData());
    }}
