<?php

namespace Piggy\Api\Traits\Endpoints;

use InvalidArgumentException;
use Piggy\Api\Endpoints\BaseEndpoint;
use Piggy\Api\Http\Response;
use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\BaseModel;
use UnexpectedValueException;

/**
 * @mixin BaseEndpoint
 *
 * @template T of BaseModel
 */
trait ResponseToModelCollectionMapper
{
    /**
     * @param  class-string<BaseCollectionMapper<T>>  $mapper
     * @return T[]
     */
    protected static function mapToList(Response $response, string $mapper): array
    {
        if (! is_subclass_of($mapper, BaseCollectionMapper::class)) {
            throw new InvalidArgumentException('Mapper must be an instance of BaseCollectionMapper');
        }

        $responseData = $response->getData();

        if (! is_array($responseData)) {
            throw new UnexpectedValueException('Expected response data to be of type array.');
        }

        return $mapper::map($responseData);
    }
}
