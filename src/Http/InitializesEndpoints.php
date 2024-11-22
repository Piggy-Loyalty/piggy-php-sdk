<?php

namespace Piggy\Api\Http;

use Piggy\Api\Endpoints\AutomationsEndpoint;
use Piggy\Api\Endpoints\BrandKitEndpoint;

trait InitializesEndpoints
{
    public BrandKitEndpoint $brandKit;
    public AutomationsEndpoint $automations;

    protected function initializeEndpoints(): void
    {
        $this->brandKit = new BrandKitEndpoint($this);
        $this->automations = new AutomationsEndpoint($this);
    }
}
