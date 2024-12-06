<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Referrals\ReferralCollectionMapper;
use Piggy\Api\Models\Referral\Referral;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;

class ReferralsEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<Referral> */
    use ResponseToModelCollectionMapper;

    protected string $resourceUri = 'referrals';

    /**
     * List all referrals.
     *
     * @param  mixed[]  $params
     * @return Referral[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToList(
            response: $response,
            mapper: ReferralCollectionMapper::class
        );
    }
}
