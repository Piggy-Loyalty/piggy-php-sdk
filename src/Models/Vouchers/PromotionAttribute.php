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

    public function setPlaceholder(string $placeholder): void
    {
        $this->placeholder = $placeholder;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

}

