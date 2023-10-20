<?php

namespace Piggy\Api\Models\Loyalty\Transaction;

use DateTime;

class LoyaltyTransactionAttribute
{
    protected $name;
    protected $label;
    protected $placeholder;
    protected $type;
    protected $field_type;
    protected $options;
    protected $is_piggy_defined;
    protected $is_soft_read_only;
    protected $is_hard_read_only;

    public function __construct(
        string  $name,
        string  $label,
        string  $type,
        string  $field_type,
        ?string $placeholder = null,
        array   $options = [],
        bool    $is_piggy_defined = false,
        bool    $is_soft_read_only = false,
        bool    $is_hard_read_only = false
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->field_type = $field_type;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->is_piggy_defined = $is_piggy_defined;
        $this->is_soft_read_only = $is_soft_read_only;
        $this->is_hard_read_only = $is_hard_read_only;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getFieldType(): string
    {
        return $this->field_type;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function isPiggyDefined(): bool
    {
        return $this->is_piggy_defined;
    }

    public function isSoftReadOnly(): bool
    {
        return $this->is_soft_read_only;
    }

    public function isHardReadOnly(): bool
    {
        return $this->is_hard_read_only;
    }
}
