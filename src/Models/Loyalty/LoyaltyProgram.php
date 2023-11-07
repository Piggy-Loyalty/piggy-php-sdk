<?php

namespace Piggy\Api\Models\Loyalty;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Mappers\Loyalty\LoyaltyProgramMapper;

/**
 * Class LoyaltyProgram
 * @package Piggy\Api\Models\Loyalty
 */
class LoyaltyProgram
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    private $customCreditName;
    /**
     * @var int|null
     */
    private $maxAmount;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/register/loyalty-program";

    /**
     * @var string
     */
    protected static $mapper = LoyaltyProgramMapper::class;

    /**
     * @param int $id
     * @param string $name
     * @param int|null $maxAmount
     * @param string $customCreditName
     */
    public function __construct(int $id, string $name, ?int $maxAmount = null, string $customCreditName = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->customCreditName = $customCreditName;
        $this->maxAmount = $maxAmount;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCustomCreditName(): string
    {
        return $this->customCreditName;
    }

    /**
     * @return int|null
     */
    public function getMaxAmount(): ?int
    {
        return $this->maxAmount;
    }

    /**
     * @param array $params
     * @return LoyaltyProgram
     * @throws GuzzleException
     */
    public static function get(array $params = []): LoyaltyProgram
    {
        $response = ApiClient::get(self::$resourceUri, $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
