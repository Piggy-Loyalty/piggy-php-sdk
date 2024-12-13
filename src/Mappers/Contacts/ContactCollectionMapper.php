<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Contact\Contact;
use stdClass;

/**
 * @extends BaseCollectionMapper<Contact>
 */
class ContactCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Contact[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: ContactMapper::class
        );
    }
}
