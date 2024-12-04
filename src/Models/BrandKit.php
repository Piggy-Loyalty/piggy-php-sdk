<?php

namespace Piggy\Api\Models;

readonly class BrandKit extends BaseModel
{
    public function __construct(
        public ?string $small_logo_url,
        public ?string $large_logo_url,
        public ?string $primary_color,
        public ?string $secondary_color,
        public ?string $tertiary_color,
        public ?string $quaternary_color,
        public ?string $font_family
    ) {
        //
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
