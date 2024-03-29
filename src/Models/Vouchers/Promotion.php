<?php

namespace Piggy\Api\Models\Vouchers;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\Vouchers\PromotionMapper;
use Piggy\Api\StaticMappers\Vouchers\PromotionsMapper;
use stdClass;

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
     * @var array
     */
    protected $attributes;

    /**
     * @var string
     */
    const resourceUri = "/api/v3/oauth/clients/promotions";

    /**
     * @param string $uuid
     * @param string $name
     * @param string $description
     * @param int|null $voucher_limit
     * @param int|null $limit_per_contact
     * @param int|null $expiration_duration
     * @param stdClass|null $attributes
     */
    public function __construct(
        string $uuid,
        string $name,
        string $description,
        ?int   $voucher_limit = null,
        ?int   $limit_per_contact = null,
        ?int   $expiration_duration = null,
        array  $attributes = []
    )
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->voucher_limit = $voucher_limit;
        $this->limit_per_contact = $limit_per_contact;
        $this->expiration_duration = $expiration_duration;
        $this->attributes = $attributes;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int|null
     */
    public function getVoucherLimit(): ?int
    {
        return $this->voucher_limit;
    }

    /**
     * @return int|null
     */
    public function getLimitPerContact(): ?int
    {
        return $this->limit_per_contact;
    }

    /**
     * @return int|null
     */
    public function getExpirationDuration(): ?int
    {
        return $this->expiration_duration;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $body
     * @return Promotion
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body): Promotion
    {
        $response = ApiClient::post(self::resourceUri, $body);

        return PromotionMapper::map($response->getData());
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::resourceUri, $params);

        return PromotionsMapper::map((array)$response->getData());
    }
}

