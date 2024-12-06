<?php

namespace Piggy\Api\Mappers;

use InvalidArgumentException;
use Piggy\Api\Models\BaseModel;
use stdClass;

/**
 * @template T of BaseModel
 */
abstract class BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return T[]
     */
    abstract public static function map(array $data): array;

    /**
     * Maps an array of data objects to an array of models using a specified mapper class.
     *
     * @param  stdClass[]  $data  An array of data objects to be mapped.
     * @param  class-string<BaseModelMapper<T>>  $mapper  The fully qualified class name of a mapper that extends BaseModelMapper.
     * @return T[] An array of models of type T, which extends BaseModel.
     *
     * @throws InvalidArgumentException If the provided mapper does not extend BaseModelMapper.
     */
    protected static function mapDataToModels(array $data, string $mapper): array
    {
        if (! is_subclass_of($mapper, BaseModelMapper::class)) {
            throw new InvalidArgumentException('Mapper must be an instance of BaseModelMapper');
        }

        return array_map(fn ($item) => $mapper::map($item), $data);
    }
}
