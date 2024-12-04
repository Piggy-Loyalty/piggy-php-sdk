<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Referrals\ReferralCollectionMapper;
use Piggy\Api\Models\Referral\Referral;

class ReferralsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'referrals';

    /**
     * @param  mixed[]  $params
     * @return Referral[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        $mapper = new ReferralCollectionMapper;

        return $mapper->map($response->getData());
    }
}
