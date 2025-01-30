<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Perk\PerkOption;
use stdClass;

/**
 * @extends BaseModelMapper<PerkOption>
 */
class PerkOptionMapper extends BaseModelMapper
{
    public static function map(stdClass $data): PerkOption
    {
        return new PerkOption(
            label: $data->label,
            value: $data->value,
            default: $data->default,
            perk: PerkMapper::map($data->perk)
        );
    }
}
