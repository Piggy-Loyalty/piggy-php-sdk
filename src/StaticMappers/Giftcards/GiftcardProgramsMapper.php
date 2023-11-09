<?php

namespace Piggy\Api\StaticMappers\Giftcards;

class GiftcardProgramsMapper
{
    /**
     * @param $data
     * @return array
     */
    public function map($data): array
    {
        $mapper = new GiftcardProgramMapper();

        $giftcardPrograms = [];

        foreach ($data as $item) {
            $giftcardPrograms[] = $mapper->map($item);
        }

        return $giftcardPrograms;
    }
}