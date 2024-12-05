<?php

namespace Piggy\Api\Mappers;

use InvalidArgumentException;
use Piggy\Api\Models\BaseModel;
use stdClass;

abstract class BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return BaseModel[]
     */
    abstract public static function map(array $data): array;

    /**
     * @param  stdClass[]  $data
     * @param  class-string<BaseModelMapper>  $mapper
     * @return BaseModel[]
     */
    protected static function mapDataToModels(array $data, string $mapper): array
    {
        if (! is_subclass_of($mapper, BaseModelMapper::class)) {
            throw new InvalidArgumentException('Mapper must be an instance of BaseModelMapper');
        }

        return array_map(fn ($item) => $mapper::map($item), $data);
    }
}
