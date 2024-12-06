<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Referrals\ReferralProgramMapper;
use Piggy\Api\Models\Referral\ReferralProgram;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class ReferralProgramEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelMapper<ReferralProgram> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'referral-program';

    /**
     * Get the referral program.
     *
     * @param  mixed[]  $params
     *
     * @throws PiggyRequestException
     */
    public function get(array $params = []): ReferralProgram
    {
        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToModel(
            response: $response,
            mapper: ReferralProgramMapper::class
        );
    }
}
