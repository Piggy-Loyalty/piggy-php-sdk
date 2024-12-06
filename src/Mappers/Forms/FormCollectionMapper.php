<?php

namespace Piggy\Api\Mappers\Forms;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\Form;
use stdClass;

/**
 * @extends BaseCollectionMapper<Form>
 */
class FormCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return Form[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: FormMapper::class
        );
    }
}
