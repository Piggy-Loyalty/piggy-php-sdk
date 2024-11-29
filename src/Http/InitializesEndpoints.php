<?php

namespace Piggy\Api\Http;

use Piggy\Api\Endpoints\AutomationsEndpoint;
use Piggy\Api\Endpoints\BrandKitEndpoint;
use Piggy\Api\Endpoints\UnitsEndpoint;

trait InitializesEndpoints
{
    public BrandKitEndpoint $brandKit;
    public AutomationsEndpoint $automations;
    public UnitsEndpoint $units;

    protected function initializeEndpoints(): void
    {
        $this->brandKit = new BrandKitEndpoint($this);
        $this->automations = new AutomationsEndpoint($this);
        $this->units = new UnitsEndpoint($this);
    }
}
