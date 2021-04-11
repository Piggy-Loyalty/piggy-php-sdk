<?php

namespace Piggy\Api\Mappers\Loyalty;

use Piggy\Api\Models\Loyalty\StagedCreditReception;

/**
 * Class StagedCreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class StagedCreditReceptionMapper
{
    /**
     * @param object $response
     * @return StagedCreditReception
     */
    public function map(object $response): StagedCreditReception
    {
        $stagedCreditReception = new StagedCreditReception();
        $creditReceptionMapper = new CreditReceptionMapper();

        $stagedCreditReception->setId($response->id);
        $stagedCreditReception->setCredits($response->credits);
        $stagedCreditReception->setCreatedAt($response->created_at);
        $stagedCreditReception->setCreditReception($response->credit_reception ? $creditReceptionMapper->map($response->credit_reception) : null);

        return $stagedCreditReception;
    }
}
