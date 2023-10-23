<?php

namespace Piggy\Api\Models\Brandkit;

/**
 * Class Brandkit
 * @package Piggy\Api\Models\Brandkit
 */
class Brandkit
{
    protected $small_logo_url;
    protected $large_logo_url;
    protected $cover_image_url;
    protected $primary_color;
    protected $secondary_color;
    protected $tertiary_color;
    protected $quaternary_color;
    protected $font_color;
    protected $description;
    protected $corner_theme;
    protected $font_family;

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

    public function getLargeLogoUrl(): ?string
    {
        return $this->large_logo_url;
    }

    public function getSmallLogoUrl(): ?string
    {
        return $this->small_logo_url;
    }

    public function getCoverImageUrl(): ?string
    {
        return $this->cover_image_url;
    }

    public function getPrimaryColor(): string
    {
        return $this->primary_color;
    }

    public function getSecondaryColor(): string
    {
        return $this->secondary_color;
    }

    public function getTertiaryColor(): ?string
    {
        return $this->tertiary_color;
    }

    public function getQuaternaryColor(): ?string
    {
        return $this->quaternary_color;
    }

    public function getFontColor(): ?string
    {
        return $this->font_color;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getCornerTheme(): ?string
    {
        return $this->corner_theme;
    }

    public function getFontFamily(): ?string
    {
        return $this->font_family;
    }
}
