<?php

namespace Piggy\Api\Models\Prepaid;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
use Piggy\Api\Mappers\Prepaid\PrepaidTransactionMapper;

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
    protected static $resourceUri = "/api/v3/register/prepaid-transactions";

    /**
     * @var string
     */
    protected static $mapper = PrepaidTransactionMapper::class;

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
     * @param array $body
     * @return PrepaidTransaction
     * @throws GuzzleException
     */
    public static function create(array $body): PrepaidTransaction
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
