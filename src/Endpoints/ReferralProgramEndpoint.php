<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Referrals\ReferralProgramMapper;
use Piggy\Api\Models\Referral\ReferralProgram;

class ReferralProgramEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'referral-program';

    /**
     * Get the referral program.
     *
     * @throws PiggyRequestException
     */
    public function get(array $params = []): ReferralProgram
    {
        $response = $this->client->get($this->resourceUri, $params);

        return ReferralProgramMapper::map($response->getData());
    }
}
