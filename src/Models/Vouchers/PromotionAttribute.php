<?php

namespace Piggy\Api\Models\Vouchers;

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
     * @var string
     */
    protected $placeholder;

    public function __construct(string $name, string $description, string $label, string $placeholder, string $type, array $options, ?int $id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->options = $options;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}

