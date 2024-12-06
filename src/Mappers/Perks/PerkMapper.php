<?php

namespace Piggy\Api\Mappers\Perks;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Perk\Perk;
use stdClass;

/**
 * @extends BaseModelMapper<Perk>
 */
class PerkMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Perk
    {
        return new Perk(
            uuid: $data->uuid,
            label: $data->label,
            name: $data->name
        );
    }
}
