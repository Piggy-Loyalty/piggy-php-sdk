<?php

namespace Piggy\Api\Mappers;

use InvalidArgumentException;
use Piggy\Api\Traits\DateParser;
use stdClass;

abstract class BaseCollectionMapper
{
    use DateParser;

    /**
     * @param  stdClass[]  $data
     * @return array<mixed, mixed>
     */
    abstract public function map(array $data): array;

    /**
     * @param  stdClass[]  $data
     * @param  class-string<BaseModelMapper>  $mapper
     * @return array<mixed, mixed>
     */
    protected function mapDataToModels(array $data, string $mapper): array
    {
        if (! is_subclass_of($mapper, BaseModelMapper::class)) {
            throw new InvalidArgumentException('Mapper must be an instance of BaseModelMapper');
        }

        return array_map(fn ($item) => (new $mapper)->map($item), $data);
    }
}
