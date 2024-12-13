<?php

namespace Piggy\Api\Mappers\BusinessProfiles;

use Piggy\Api\Enums\BusinessProfileType;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\BusinessProfile\BusinessProfile;
use stdClass;

/**
 * @extends BaseModelMapper<BusinessProfile>
 */
class BusinessProfileMapper extends BaseModelMapper
{
    public static function map(stdClass $data): BusinessProfile
    {
        return new BusinessProfile(
            uuid: $data->uuid,
            type: BusinessProfileType::from($data->type),
            name: $data->name,
            reference: $data->reference,
            address: $data->address
                ? BusinessProfileAddressMapper::map($data->address)
                : null
        );
    }
}
