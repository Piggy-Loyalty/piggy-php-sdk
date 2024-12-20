<?php

namespace Piggy\Api\Http;

use Piggy\Api\Endpoints\AutomationsEndpoint;
use Piggy\Api\Endpoints\BookingsEndpoint;
use Piggy\Api\Endpoints\BrandKitEndpoint;
use Piggy\Api\Endpoints\BusinessProfilesEndpoint;
use Piggy\Api\Endpoints\CollectableRewardsEndpoint;
use Piggy\Api\Endpoints\ContactsEndpoint;
use Piggy\Api\Endpoints\FormsEndpoint;
use Piggy\Api\Endpoints\PrepaidTransactionsEndpoint;
use Piggy\Api\Endpoints\ReferralProgramEndpoint;
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

    public ReferralProgramEndpoint $referralProgram;

    public BusinessProfilesEndpoint $businessProfiles;

    public PrepaidTransactionsEndpoint $prepaidTransactions;

    public ContactsEndpoint $contacts;

    public CollectableRewardsEndpoint $collectableRewards;

    protected function initializeEndpoints(): void
    {
        $this->brandKit = new BrandKitEndpoint($this);
        $this->automations = new AutomationsEndpoint($this);
        $this->units = new UnitsEndpoint($this);
        $this->bookings = new BookingsEndpoint($this);
        $this->forms = new FormsEndpoint($this);
        $this->tiers = new TiersEndpoint($this);
        $this->referrals = new ReferralsEndpoint($this);
        $this->referralProgram = new ReferralProgramEndpoint($this);
        $this->businessProfiles = new BusinessProfilesEndpoint($this);
        $this->prepaidTransactions = new PrepaidTransactionsEndpoint($this);
        $this->contacts = new ContactsEndpoint($this);
        $this->collectableRewards = new CollectableRewardsEndpoint($this);
    }
}
