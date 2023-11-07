<?php

namespace Piggy\Api\Models\Loyalty\RewardAttributes;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\Environment;
use Piggy\Api\Mappers\Loyalty\RewardAttributes\RewardAttributeMapper;
use Piggy\Api\Mappers\Loyalty\RewardAttributes\RewardAttributesMapper;

/**
 * Class RewardAttribute
 * @package Piggy\Api\Models\Loyalty\RewardAttributes
 */
class RewardAttribute
{
    /** @var string */
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
    protected $dataType;

    /**
     * @var string|null
     */
    protected $fieldType;

    /**
     * @var boolean|null
     */
    protected $isSoftReadOnly;

    /**
     * @var boolean|null
     */
    protected $isHardReadOnly;

    /**
     * @var boolean|null
     */
    protected $isPiggyDefined;

    /**
     * @var array|null
     */
    protected $options;

    /**
     * @var string|null
     */
    protected $placeholder;

    /**
     * @var string
     */
    protected static $mapper = RewardAttributeMapper::class;


    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/reward-attributes";

    /**
     * @param string $name
     * @param string $label
     * @param string $description
     * @param string $dataType
     * @param string|null $fieldType
     * @param bool|null $isSoftReadOnly
     * @param bool|null $isHardReadOnly
     * @param bool|null $isPiggyDefined
     * @param array|null $options
     * @param string|null $placeholder
     */
    public function __construct(string $name, string $label, string $description, string $dataType, ?string $fieldType, ?bool $isSoftReadOnly = null, ?bool $isHardReadOnly = null, ?bool $isPiggyDefined = null, ?array $options = null, ?string $placeholder = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $this->dataType = $dataType;
        $this->fieldType = $fieldType;
        $this->isSoftReadOnly = $isSoftReadOnly;
        $this->isHardReadOnly = $isHardReadOnly;
        $this->isPiggyDefined = $isPiggyDefined;
        $this->options = $options;
        $this->placeholder = $placeholder;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return void
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->dataType;
    }

    /**
     * @param string $dataType
     * @return void
     */
    public function setType(string $dataType): void
    {
        $this->dataType = $dataType;
    }

    /**
     * @return string|null
     */
    public function getFieldType(): ?string
    {
        return $this->fieldType;
    }

    /**
     * @param string $fieldType
     * @return void
     */
    public function setFieldType(string $fieldType): void
    {
        $this->fieldType = $fieldType;
    }

    /**
     * @return bool | null
     */
    public function getIsSoftReadOnly(): ?bool
    {
        return $this->isSoftReadOnly;
    }

    /**
     * @param bool $isSoftReadOnly
     * @return void
     */
    public function setIsSoftReadOnly(bool $isSoftReadOnly): void
    {
        $this->isSoftReadOnly = $isSoftReadOnly;
    }

    /**
     * @return bool | null
     */
    public function getIsHardReadOnly(): ?bool
    {
        return $this->isHardReadOnly;
    }

    /**
     * @param bool $isHardReadOnly
     * @return void
     */
    public function setIsHardReadOnly(bool $isHardReadOnly): void
    {
        $this->isHardReadOnly = $isHardReadOnly;
    }

    /**
     * @return bool | null
     */
    public function getIsPiggyDefined(): ?bool
    {
        return $this->isPiggyDefined;
    }

    /**
     * @param bool $isPiggyDefined
     */
    public function setIsPiggyDefined(bool $isPiggyDefined): void
    {
        $this->isPiggyDefined = $isPiggyDefined;
    }

    /**
     * @return array | null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param array | null $options
     */
    public function setOptions(?array $options): void
    {
        $this->options = $options;
    }

    /**
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @param string|null $placeholder
     * @return void
     */
    public function setPlaceholder(?string $placeholder): void
    {
        $this->placeholder = $placeholder;
    }

    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new RewardAttributesMapper();

        return $mapper->map((array)$response->getData());
    }

    /**
     * @param array $body
     * @return RewardAttribute
     * @throws GuzzleException
     */
    public static function create(array $body): RewardAttribute
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}