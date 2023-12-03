<?php

namespace Piggy\Api\Models\Prepaid;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Prepaid\PrepaidTransactionMapper;

/**
 * Class PrepaidTransaction
 * @package Piggy\Api\Models
 */
class PrepaidTransaction
{
    /**
     * @var int
     */
    protected $amountInCents;

    /**
     * @var PrepaidBalance
     */
    protected $prepaidBalance;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/prepaid-transactions";

    /**
     * @param int $amountInCents
     * @param PrepaidBalance $prepaidBalance
     * @param string $uuid
     * @param DateTime $createdAt
     */
    public function __construct(int $amountInCents, PrepaidBalance $prepaidBalance, string $uuid, DateTime $createdAt)
    {
        $this->amountInCents = $amountInCents;
        $this->prepaidBalance = $prepaidBalance;
        $this->uuid = $uuid;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getAmountInCents(): int
    {
        return $this->amountInCents;
    }

    /**
     * @return PrepaidBalance
     */
    public function getPrepaidBalance(): PrepaidBalance
    {
        return $this->prepaidBalance;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param array $params
     * @return PrepaidTransaction
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body): PrepaidTransaction
    {
        $response = ApiClient::post(self::$resourceUri, $body);

        return PrepaidTransactionMapper::map($response->getData());
    }
}
