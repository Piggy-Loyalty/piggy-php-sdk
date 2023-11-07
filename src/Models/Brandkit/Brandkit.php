<?php

namespace Piggy\Api\Models\Brandkit;

use Piggy\Api\ApiClient;
use Piggy\Api\Mappers\Brandkit\BrandkitMapper;

/**
 * Class Brandkit
 * @package Piggy\Api\Models\Brandkit
 */
class Brandkit
{
    /**
     * @var string|null
     */
    protected $small_logo_url;
    /**
     * @var string|null
     */
    protected $large_logo_url;
    /**
     * @var string|null
     */
    protected $cover_image_url;
    /**
     * @var string|null
     */
    protected $primary_color;
    /**
     * @var string|null
     */
    protected $secondary_color;
    /**
     * @var string|null
     */
    protected $tertiary_color;
    /**
     * @var string|null
     */
    protected $quaternary_color;
    /**
     * @var string|null
     */
    protected $font_color;
    /**
     * @var string|null
     */
    protected $description;
    /**
     * @var string|null
     */
    protected $corner_theme;
    /**
     * @var string|null
     */
    protected $font_family;

    /**
     * @var string
     */
    protected static $resourceUri = "/api/v3/oauth/clients/brand-kit";

    /**
     * @var string
     */
    protected static $mapper = BrandkitMapper::class;


    /**
     * @param string|null $small_logo_url
     * @param string|null $large_logo_url
     * @param string|null $cover_image_url
     * @param string|null $primary_color
     * @param string|null $secondary_color
     * @param string|null $tertiary_color
     * @param string|null $quaternary_color
     * @param string|null $font_color
     * @param string|null $description
     * @param string|null $corner_theme
     * @param string|null $font_family
     */
    public function __construct(
        ?string $small_logo_url = null,
        ?string $large_logo_url = null,
        ?string $cover_image_url = null,
        ?string $primary_color = null,
        ?string $secondary_color = null,
        ?string $tertiary_color = null,
        ?string $quaternary_color = null,
        ?string $font_color = null,
        ?string $description = null,
        ?string $corner_theme = null,
        ?string $font_family = null
    )
    {
        $this->small_logo_url = $small_logo_url;
        $this->large_logo_url = $large_logo_url;
        $this->cover_image_url = $cover_image_url;
        $this->primary_color = $primary_color;
        $this->secondary_color = $secondary_color;
        $this->tertiary_color = $tertiary_color;
        $this->quaternary_color = $quaternary_color;
        $this->font_color = $font_color;
        $this->description = $description;
        $this->corner_theme = $corner_theme;
        $this->font_family = $font_family;
    }

    /**
     * @return string|null
     */
    public function getLargeLogoUrl(): ?string
    {
        return $this->large_logo_url;
    }

    /**
     * @return string|null
     */
    public function getSmallLogoUrl(): ?string
    {
        return $this->small_logo_url;
    }

    /**
     * @return string|null
     */
    public function getCoverImageUrl(): ?string
    {
        return $this->cover_image_url;
    }

    /**
     * @return string|null
     */
    public function getPrimaryColor(): ?string
    {
        return $this->primary_color;
    }

    /**
     * @return string|null
     */
    public function getSecondaryColor(): ?string
    {
        return $this->secondary_color;
    }

    /**
     * @return string|null
     */
    public function getTertiaryColor(): ?string
    {
        return $this->tertiary_color;
    }

    /**
     * @return string|null
     */
    public function getQuaternaryColor(): ?string
    {
        return $this->quaternary_color;
    }

    /**
     * @return string|null
     */
    public function getFontColor(): ?string
    {
        return $this->font_color;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getCornerTheme(): ?string
    {
        return $this->corner_theme;
    }

    /**
     * @return string|null
     */
    public function getFontFamily(): ?string
    {
        return $this->font_family;
    }

    /**
     * @return Brandkit
     * @throws \Piggy\Api\Exceptions\PiggyRequestException
     */
    public static function get(): Brandkit
    {
        $response = ApiClient::get(self::$resourceUri);

        $mapper = new self::$mapper;

        return $mapper->map($response->getData());
    }
}
