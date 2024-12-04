<?php

namespace Piggy\Api\Http;

use Piggy\Api\Endpoints\AutomationsEndpoint;
use Piggy\Api\Endpoints\BookingsEndpoint;
use Piggy\Api\Endpoints\BrandKitEndpoint;
use Piggy\Api\Endpoints\FormsEndpoint;
use Piggy\Api\Endpoints\ReferralsEndpoint;
use Piggy\Api\Endpoints\TiersEndpoint;
use Piggy\Api\Endpoints\UnitsEndpoint;

trait InitializesEndpoints
{
    public BrandKitEndpoint $brandKit;
    public AutomationsEndpoint $automations;
    public UnitsEndpoint $units;
    public BookingsEndpoint $bookings;
    public FormsEndpoint $forms;
    public TiersEndpoint $tiers;
    public ReferralsEndpoint $referrals;

    protected function initializeEndpoints(): void
    {
        $this->brandKit = new BrandKitEndpoint($this);
        $this->automations = new AutomationsEndpoint($this);
        $this->units = new UnitsEndpoint($this);
        $this->bookings = new BookingsEndpoint($this);
        $this->forms = new FormsEndpoint($this);
        $this->tiers = new TiersEndpoint($this);
        $this->referrals = new ReferralsEndpoint($this);
    }
}
