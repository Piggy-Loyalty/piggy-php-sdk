<?php

namespace Piggy\Api\Models;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Responses\Response;
use Piggy\Api\Model;

class Promotion extends Model
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
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/promotions";

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

//    public static function createFromStdClass($stdClass): Promotion
//    {
//        $instance = new self();
//
//        foreach ($stdClass as $property => $value) {
//            $instance->$property = $value;
//        }
//
//        return $instance;
//    }

    /**
     * @param array $params
     * @return Promotion
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body): Model
    {
        $response = ApiClient::post(self::$resourceUri, $body);

        return Model::createTypedClassFromStdClass($response->getData(), Promotion::class);
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::$resourceUri, $params);

        return (array)$response->getData();
    }
}