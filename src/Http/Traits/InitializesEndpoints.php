<?php

namespace Piggy\Api\Http\Traits;

use Piggy\Api\Endpoints\BrandKitEndpoint;

trait InitializesEndpoints
{
    public BrandKitEndpoint $brandKit;

    protected function initializeEndpoints(): void
    {
        $this->brandKit = new BrandKitEndpoint($this);
    }
}
