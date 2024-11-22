<?php

namespace Piggy\Api\Models;

class BrandKit
{
    protected ?string $small_logo_url;

    protected ?string $large_logo_url;

    protected ?string $primary_color;

    protected ?string $secondary_color;

    protected ?string $tertiary_color;

    protected ?string $quaternary_color;

    protected ?string $font_family;

    public function __construct(
        ?string $small_logo_url,
        ?string $large_logo_url,
        ?string $primary_color,
        ?string $secondary_color,
        ?string $tertiary_color,
        ?string $quaternary_color,
        ?string $font_family
    ) {
        $this->small_logo_url = $small_logo_url;
        $this->large_logo_url = $large_logo_url;
        $this->primary_color = $primary_color;
        $this->secondary_color = $secondary_color;
        $this->tertiary_color = $tertiary_color;
        $this->quaternary_color = $quaternary_color;
        $this->font_family = $font_family;
    }

    public function getSmallLogoUrl(): ?string
    {
        return $this->small_logo_url;
    }

    public function getLargeLogoUrl(): ?string
    {
        return $this->large_logo_url;
    }

    public function getPrimaryColor(): ?string
    {
        return $this->primary_color;
    }

    public function getSecondaryColor(): ?string
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

    public function getFontFamily(): ?string
    {
        return $this->font_family;
    }
}
