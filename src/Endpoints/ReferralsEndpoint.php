<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Referrals\ReferralCollectionMapper;
use Piggy\Api\Models\Referral\Referral;

class ReferralsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'referrals';

    /**
     * List all referrals.
     *
     * @return Referral[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        return ReferralCollectionMapper::map($response->getData());
    }
}
