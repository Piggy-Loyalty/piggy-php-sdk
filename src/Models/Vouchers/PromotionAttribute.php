<?php

namespace Piggy\Api\Models\Vouchers;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Vouchers\PromotionAttributeMapper;
use Piggy\Api\Mappers\Vouchers\PromotionAttributesMapper;

/**
 * Class PromotionAttribute
 * @package Piggy\Api\Models\Voucherse
 */
class PromotionAttribute
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var int|null
     */
    protected $id;

    /**
     * @var ?string
     */
    protected $placeholder;

    /**
     * @var string
     */
    protected static $mapper = PromotionAttributeMapper::class;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/promotion-attributes";

    /**
     * @param string $name
     * @param string $description
     * @param string $label
     * @param string $type
     * @param array $options
     * @param int|null $id
     * @param string|null $placeholder
     */
    public function __construct(
        string  $name,
        string  $description,
        string  $label,
        string  $type,
        array   $options,
        ?int    $id = null,
        ?string $placeholder = null
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->label = $label;
        $this->type = $type;
        $this->options = $options;
        $this->id = $id;
        $this->placeholder = $placeholder;
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
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::$resourceUri, $params);

        $mapper = new PromotionAttributesMapper();

        return $mapper->map($response->getData());
    }

    /**
     * @param $promotionAttributeId
     * @param array $params
     * @return PromotionAttribute
     * @throws GuzzleException
     */
    public static function get($promotionAttributeId, array $params = []): PromotionAttribute
    {
        $response = ApiClient::get(self::$resourceUri . "/$promotionAttributeId", $params);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param array $body
     * @return PromotionAttribute
     * @throws GuzzleException
     */
    public static function create(array $body): PromotionAttribute
    {
        $response = ApiClient::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }

    /**
     * @param $promotionAttributeId
     * @param array $body
     * @return PromotionAttribute
     * @throws GuzzleException
     */
    public static function update($promotionAttributeId, array $body): PromotionAttribute
    {
        $response = ApiClient::put(self::$resourceUri . "/$promotionAttributeId", $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}

