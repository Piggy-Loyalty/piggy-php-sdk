<?php

namespace Piggy\Api\Mappers\Giftcards;

use Piggy\Api\Models\Giftcards\GiftcardProgram;
use stdClass;

/**
 * Class GiftcardMapper
 * @package Piggy\Api\Mappers\Giftcards
 */
class GiftcardProgramMapper
{
    /**
     * @param stdClass $data
     * @return GiftcardProgram
     */
    public function map(stdClass $data): GiftcardProgram
    {
        return new GiftcardProgram(
            $data->uuid,
            $data->name,
            $data->active
        );
    }

}