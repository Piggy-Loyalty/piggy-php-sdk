<?php

namespace Piggy\Api\Mappers\PrepaidTransactions;

use Piggy\Api\Mappers\BaseCollectionMapper;
use Piggy\Api\Models\PrepaidTransaction\PrepaidTransaction;
use stdClass;

/**
 * @extends BaseCollectionMapper<PrepaidTransaction>
 */
class PrepaidTransactionCollectionMapper extends BaseCollectionMapper
{
    /**
     * @param  stdClass[]  $data
     * @return PrepaidTransaction[]
     */
    public static function map(array $data): array
    {
        return self::mapDataToModels(
            data: $data,
            mapper: PrepaidTransactionMapper::class
        );
    }
}
