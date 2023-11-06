<?php

namespace Piggy\Api\Models\Loyalty\Transactions;

use Piggy\Api\Environment;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Loyalty\LoyaltyTransactionAttributes\LoyaltyTransactionAttributeMapper;
use Piggy\Api\Mappers\Loyalty\LoyaltyTransactionAttributes\LoyaltyTransactionAttributesMapper;

class LoyaltyTransactionAttribute
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
     * @var string|null
     */
    protected $placeholder;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $field_type;
    /**
     * @var array
     */
    protected $options;
    /**
     * @var bool
     */
    protected $is_piggy_defined;
    /**
     * @var bool
     */
    protected $is_soft_read_only;
    /**
     * @var bool
     */
    protected $is_hard_read_only;

    /**
     * @var string
     */
    protected static $mapper = LoyaltyTransactionAttributeMapper::class;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/loyalty-transaction-attributes";


    /**
     * @param string $name
     * @param string $label
     * @param string $type
     * @param string $field_type
     * @param string|null $placeholder
     * @param array $options
     * @param bool $is_piggy_defined
     * @param bool $is_soft_read_only
     * @param bool $is_hard_read_only
     */
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
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return $this->field_type;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return bool
     */
    public function isPiggyDefined(): bool
    {
        return $this->is_piggy_defined;
    }

    /**
     * @return bool
     */
    public function isSoftReadOnly(): bool
    {
        return $this->is_soft_read_only;
    }

    /**
     * @return bool
     */
    public function isHardReadOnly(): bool
    {
        return $this->is_hard_read_only;
    }

    /**
     * @param array $params
     * @return array
     * @throws PiggyRequestException
     */
    public static function list(array $params = []): array
    {
        $response = Environment::get(self::$resourceUri, $params);

        $mapper = new LoyaltyTransactionAttributesMapper();

        return $mapper->map((array)$response->getData());
    }

    /**
     * @param array $body
     * @return LoyaltyTransactionAttribute
     * @throws PiggyRequestException
     */
    public static function create(array $body): LoyaltyTransactionAttribute
    {
        $response = Environment::post(self::$resourceUri, $body);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
