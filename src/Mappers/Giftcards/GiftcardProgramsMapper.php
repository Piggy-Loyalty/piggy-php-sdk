<?php

namespace Piggy\Api\Mappers\Giftcards;

class GiftcardProgramsMapper
{
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
