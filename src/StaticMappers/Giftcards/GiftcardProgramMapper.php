<?php

namespace Piggy\Api\StaticMappers\Giftcards;

use Piggy\Api\Models\Giftcards\GiftcardProgram;
use stdClass;

/**
 * Class GiftcardProgramMapper
 */
class GiftcardProgramMapper
{
    public static function map(stdClass $data): GiftcardProgram
    {
        return new GiftcardProgram(
            $data->uuid,
            $data->name,
            $data->active ?? true
        );
    }
}
