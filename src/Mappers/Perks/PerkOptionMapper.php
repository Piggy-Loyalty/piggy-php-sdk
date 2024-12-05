<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Perk\PerkOption;
use stdClass;

class PerkOptionMapper extends BaseModelMapper
{
    public static function map(stdClass $data): PerkOption
    {
        return new PerkOption(
            $data->label,
            $data->value,
            $data->default,
            PerkMapper::map($data->perk)
        );
    }
}
