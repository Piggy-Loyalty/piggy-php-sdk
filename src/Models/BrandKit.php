<?php

namespace Piggy\Api\Models;

readonly class BrandKit extends BaseModel
{
    public function __construct(
        public ?string $smallLogoUrl,
        public ?string $largeLogoUrl,
        public ?string $primaryColor,
        public ?string $secondaryColor,
        public ?string $tertiaryColor,
        public ?string $quaternaryColor,
        public ?string $fontFamily
    ) {
        //
    }

    public function getSmallLogoUrl(): ?string
    {
        return $this->smallLogoUrl;
    }

    public function getLargeLogoUrl(): ?string
    {
        return $this->largeLogoUrl;
    }

    public function getPrimaryColor(): ?string
    {
        return $this->primaryColor;
    }

    public function getSecondaryColor(): ?string
    {
        return $this->secondaryColor;
    }

    public function getTertiaryColor(): ?string
    {
        return $this->tertiaryColor;
    }

    public function getQuaternaryColor(): ?string
    {
        return $this->quaternaryColor;
    }

    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }
}
