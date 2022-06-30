<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class Attribute
 * @package Piggy\Api\Models
 */
class Attribute
{
    /** @var string */
    public $name;

    /**
     * @var string|null
     */
    public $label;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $field_type;
    /**
     * @var boolean|null
     */
    public $is_soft_read_only;
    /**
     * @var boolean|null
     */
    public $is_hard_read_only;
    /**
     * @var boolean
     */
    public $is_piggy_defined;
    /**
     * @var array|null
     */
    public $options;

    public function __construct(string $name, ?string $label, ?string $description, string $type, string $field_type, ?bool $is_soft_read_only, ?bool $is_hard_read_only, bool $is_piggy_defined, ?array $options)
    {
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $this->type = $type;
        $this->field_type = $field_type;
        $this->is_soft_read_only = $is_soft_read_only;
        $this->is_hard_read_only = $is_hard_read_only;
        $this->is_piggy_defined = $is_piggy_defined;
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
     * @return string
     */
    public function getFieldType(): string
    {
        return $this->field_type;
    }

    /**
     * @param string $field_type
     * @return void
     */
    public function setFieldType(string $field_type): void
    {
        $this->field_type = $field_type;
    }

    /**
     * @return bool
     */
    public function isIsSoftReadOnly(): bool
    {
        return $this->is_soft_read_only;
    }

    /**
     * @param bool $is_soft_read_only
     * @return void
     */
    public function setIsSoftReadOnly(bool $is_soft_read_only): void
    {
        $this->is_soft_read_only = $is_soft_read_only;
    }

    /**
     * @return bool
     */
    public function isIsHardReadOnly(): bool
    {
        return $this->is_hard_read_only;
    }

    /**
     * @param bool $is_hard_read_only
     * @return void
     */
    public function setIsHardReadOnly(bool $is_hard_read_only): void
    {
        $this->is_hard_read_only = $is_hard_read_only;
    }

    /**
     * @return bool
     */
    public function isIsPiggyDefined(): bool
    {
        return $this->is_piggy_defined;
    }

    /**
     * @param bool $is_piggy_defined
     */
    public function setIsPiggyDefined(bool $is_piggy_defined): void
    {
        $this->is_piggy_defined = $is_piggy_defined;
    }

    /**
     * @return array|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
}
