<?php

namespace Piggy\Api\Mappers\Loyalty;

/**
 * Class MembersMapper
 * @package Piggy\Api\Mappers\Loyalty
 */
class MembersMapper
{
    /**
     * @param array $data
     * @return array
     */
    public function map(array $data): array
    {
        $memberMapper = new MemberMapper();

        $members = [];
        foreach ($data as $item) {
            $members[] = $memberMapper->map($item);
        }

        return $members;
    }
}
