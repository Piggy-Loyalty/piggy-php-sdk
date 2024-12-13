<?php

namespace Piggy\Api\Mappers\BusinessProfiles;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\BusinessProfile\BusinessProfileAddress;
use stdClass;

/**
 * @extends BaseModelMapper<BusinessProfileAddress>
 */
class BusinessProfileAddressMapper extends BaseModelMapper
{
    public static function map(stdClass $data): BusinessProfileAddress
    {
        return new BusinessProfileAddress(
            houseNumber: $data->house_number,
            postalCode: $data->postal_code
        );
    }
}
