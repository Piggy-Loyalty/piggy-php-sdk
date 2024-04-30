<?php

namespace Piggy\Api\Models\Loyalty;

/**
 * Class Unit
 */
class Unit
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $label;

    /** @var bool|null */
    protected $isDefault;

    /**
     * @var string|null
     */
    protected $prefix;

    /**
     * @var string
     */
    const resourceUri = '/api/v3/oauth/clients/units';

    public function __construct(string $name, ?string $label, ?bool $isDefault, ?string $prefix)
    {
        $this->name = $name;
        $this->label = $label;
        $this->isDefault = $isDefault;
        $this->prefix = $prefix;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }
}
