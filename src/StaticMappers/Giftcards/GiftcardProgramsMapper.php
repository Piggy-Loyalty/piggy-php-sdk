<?php

namespace Piggy\Api\StaticMappers\Giftcards;

class GiftcardProgramsMapper
{
    /**
     * @param $data
     * @return array
     */
    public static function map($data): array
    {
        $giftcardPrograms = [];

        foreach ($data as $item) {
            $giftcardPrograms[] = GiftcardProgramMapper::map($item);
        }

        return $giftcardPrograms;
    }
}