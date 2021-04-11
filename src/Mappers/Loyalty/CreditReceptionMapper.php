<?php

namespace Piggy\Api\Mappers\Loyalty;

use Exception;
use Piggy\Api\Models\Loyalty\CreditReception;

/**
 * Class CreditReceptionMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class CreditReceptionMapper
{
    /**
     * @param object $data
     * @return CreditReception
     * @throws Exception
     */
    public function map(object $data): CreditReception
    {
        $memberMapper = new MemberMapper();
        $member = $memberMapper->map($data->member);

        $creditReception = new CreditReception(
            $data->id,
            $data->credits,
            $member,
            $data->created_at
        );

        return $creditReception;
    }
}
