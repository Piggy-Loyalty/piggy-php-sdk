<?php

namespace Piggy\Api\Models\CustomAttributes;

use GuzzleHttp\Exception\GuzzleException;
use Piggy\Api\ApiClient;
use Piggy\Api\Exceptions\MaintenanceModeException;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\StaticMappers\CustomAttributes\CustomAttributeMapper;
use Piggy\Api\StaticMappers\CustomAttributes\CustomAttributesMapper;

/**
 * Class CustomAttribute
 * @package Piggy\Api\Models\Customs
 */
class CustomAttribute
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $entity;

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
    protected $type;

    /**
     * @var array
     */
    protected $meta;

    /**
     * @var string
     */
    protected $groupName;

    /**
     * @var Group
     */
    protected $group;

    /**
     * @var boolean|null
     */
    protected $isPiggyDefined;

    /**
     * @var boolean|null
     */
    protected $isSoftReadOnly;

    /**
     * @var boolean|null
     */
    protected $isHardReadOnly;

    /**
     * @var string|null
     */
    protected $fieldType;

    /**
     * @var bool
     */
    protected $hasUniqueValue;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var array|null
     */
    protected $options;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @var bool
     */
    protected $canBeDeleted;

    /**
     * @var string|null
     */
    protected $lastUsedDate;

    /**
     * @var string|null
     */
    protected $createdByUser;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/custom-attributes";

    /**
     * @param int $id
     * @param string $entity
     * @param string $name
     * @param string $label
     * @param string $type
     * @param bool $isPiggyDefined
     * @param bool $isSoftReadOnly
     * @param bool $isHardReadOnly
     * @param bool $hasUniqueValue
     * @param string $description
     * @param array $options
     * @param int $position
     * @param string $createdAt
     * @param bool $canBeDeleted
     * @param array $meta
     * @param string|null $groupName
     * @param Group|null $group
     * @param string|null $fieldType
     * @param string|null $lastUsedDate
     * @param string|null $createdByUser
     */
    public function __construct(
        int $id,
        string $entity,
        string $name,
        string $label,
        string $type,
        bool $isPiggyDefined, 
        bool $isSoftReadOnly, 
        bool $isHardReadOnly,
        bool $hasUniqueValue, 
        string $description,
        array $options,
        int $position,
        string $createdAt,
        bool $canBeDeleted,
        array $meta = [],
        ?string $groupName = null,
        ?Group $group = null,
        ?string $fieldType = null,
        ?string $lastUsedDate = null,
        ?string $createdByUser = null
    ) {
        $this->id = $id;
        $this->entity = $entity;
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->groupName = $groupName;
        $this->group = $group;
        $this->isPiggyDefined = $isPiggyDefined;
        $this->isSoftReadOnly = $isSoftReadOnly;
        $this->isHardReadOnly = $isHardReadOnly;
        $this->fieldType = $fieldType;
        $this->hasUniqueValue = $hasUniqueValue;
        $this->description = $description;
        $this->options = $options;
        $this->position = $position;
        $this->meta = $meta;
        $this->createdAt = $createdAt;
        $this->canBeDeleted = $canBeDeleted;
        $this->lastUsedDate = $lastUsedDate;
        $this->createdByUser = $createdByUser;
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
    public function getEntity(): string
    {
        return $this->entity;
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
     * @return string|null
     */
    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    /**
     * @return Group|null
     */
    public function getGroup(): ?Group
    {
        return $this->group;
    }

    /**
     * @return bool
     */
    public function getIsPiggyDefined(): bool
    {
        return $this->isPiggyDefined;
    }

    /**
     * @return bool
     */
    public function getIsSoftReadOnly(): bool
    {
        return $this->isSoftReadOnly;
    }

    /**
     * @return bool
     */
    public function getIsHardReadOnly(): bool
    {
        return $this->isHardReadOnly;
    }

    /**
     * @return string|null
     */
    public function getFieldType(): ?string
    {
        return $this->fieldType;
    }

    /**
     * @return bool
     */
    public function getHasUniqueValue(): bool
    {
        return $this->hasUniqueValue;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return Option[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function getCanBeDeleted(): bool
    {
        return $this->canBeDeleted;
    }

    /**
     * @return string|null
     */
    public function getLastUsedDate(): ?string
    {
        return $this->lastUsedDate;
    }

    /**
     * @return string|null
     */
    public function getCreatedByUser(): ?string
    {
        return $this->createdByUser;
    }

    /**
     * @param array $params
     * @return array
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = ApiClient::get(self::$resourceUri, $params);

        return CustomAttributesMapper::map($response->getData());
    }

    /**
     * @param array $body
     * @return CustomAttribute
     * @throws MaintenanceModeException|GuzzleException|PiggyRequestException
     */
    public static function create(array $body): CustomAttribute
    {
        $response = ApiClient::post(self::$resourceUri, $body);

        return CustomAttributeMapper::map($response->getData());
    }

}