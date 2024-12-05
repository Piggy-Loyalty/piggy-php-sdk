<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Referrals\ReferralProgramMapper;
use Piggy\Api\Models\Referral\ReferralProgram;
use stdClass;
use UnexpectedValueException;

class ReferralProgramEndpoint extends BaseEndpoint
{
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

        $responseData = $response->getData();

        if (! $responseData instanceof stdClass) {
            throw new UnexpectedValueException('Expected response data to be of type stdClass.');
        }

        return (new ReferralProgramMapper)
            ->map($responseData);
    }
}
