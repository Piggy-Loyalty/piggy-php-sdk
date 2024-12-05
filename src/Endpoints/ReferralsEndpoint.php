<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Referrals\ReferralCollectionMapper;
use Piggy\Api\Models\Referral\Referral;
use UnexpectedValueException;

class ReferralsEndpoint extends BaseEndpoint
{
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

        $responseData = $response->getData();

        if (! is_array($responseData)) {
            throw new UnexpectedValueException('Expected response data to be of type array.');
        }

        return (new ReferralCollectionMapper)
            ->map($responseData);
    }
}
