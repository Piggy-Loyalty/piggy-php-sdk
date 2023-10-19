<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class Attribute
 * @package Piggy\Api\Models
 */
class Attribute
{

    /** @var string */
    private $name;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string|null
     */
    private $fieldType;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var boolean|null
     */
    private $isSoftReadOnly;

    /**
     * @var boolean|null
     */
    private $isHardReadOnly;

    /**
     * @var boolean|null
     */
    private $isPiggyDefined;

    /**
     * @var array|null
     */
    private $options;

    public function __construct(string $name, string $label, string $type, ?string $fieldType, ?string $description = null, ?bool $isSoftReadOnly = null, ?bool $isHardReadOnly = null, ?bool $isPiggyDefined = null, ?array $options = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->fieldType = $fieldType;
        $this->description = $description;
        $this->isSoftReadOnly = $isSoftReadOnly;
        $this->isHardReadOnly = $isHardReadOnly;
        $this->isPiggyDefined = $isPiggyDefined;
        $this->options = $options;
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getFieldType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setFieldType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
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
}