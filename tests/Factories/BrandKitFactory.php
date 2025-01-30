<?php

namespace Piggy\Api\Tests\Factories;

use Piggy\Api\Models\BrandKit;

class BrandKitFactory extends BaseFactory
{
    protected BrandKit $model;

    public function __construct(
        ?string $smallLogoUrl = null,
        ?string $largeLogoUrl = null,
        ?string $primaryColor = null,
        ?string $secondaryColor = null,
        ?string $tertiaryColor = null,
        ?string $quaternaryColor = null,
        ?string $fontFamily = null
    ) {
        parent::__construct();

        $this->model = new BrandKit(
            smallLogoUrl: $smallLogoUrl ?? $this->faker->url(),
            largeLogoUrl: $largeLogoUrl ?? $this->faker->url(),
            primaryColor: $primaryColor ?? $this->faker->hexColor(),
            secondaryColor: $secondaryColor ?? $this->faker->hexColor(),
            tertiaryColor: $tertiaryColor ?? $this->faker->hexColor(),
            quaternaryColor: 'foo',  // TODO: Fails for some reason
            fontFamily: $fontFamily ?? $this->faker->word()
        );
    }
}
