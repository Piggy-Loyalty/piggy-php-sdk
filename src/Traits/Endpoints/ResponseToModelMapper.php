<?php

namespace Piggy\Api\Traits\Endpoints;

use InvalidArgumentException;
use Piggy\Api\Endpoints\BaseEndpoint;
use Piggy\Api\Http\Response;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\BaseModel;
use stdClass;
use UnexpectedValueException;

/**
 * @mixin BaseEndpoint
 *
 * @template T of BaseModel
 */
trait ResponseToModelMapper
{
    /**
     * @param  class-string<BaseModelMapper<T>>  $mapper  The mapper class that transforms the response data into a model.
     * @return T
     */
    protected static function mapToModel(Response $response, string $mapper): BaseModel
    {
        $responseData = $response->getData();

        if (! is_subclass_of($mapper, BaseModelMapper::class)) {
            throw new InvalidArgumentException('Mapper must be an instance of BaseModelMapper');
        }

        if (! $responseData instanceof stdClass) {
            throw new UnexpectedValueException('Expected response data to be of type stdClass.');
        }

        return $mapper::map($responseData);
    }
}
