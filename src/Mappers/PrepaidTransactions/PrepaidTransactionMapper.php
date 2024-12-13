<?php

namespace Piggy\Api\Mappers\PrepaidTransactions;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Mappers\BusinessProfiles\BusinessProfileMapper;
use Piggy\Api\Mappers\Contacts\ContactIdentifierMapper;
use Piggy\Api\Models\PrepaidTransaction\PrepaidTransaction;
use stdClass;

/**
 * @extends BaseModelMapper<PrepaidTransaction>
 */
class PrepaidTransactionMapper extends BaseModelMapper
{
    public static function map(stdClass $data): PrepaidTransaction
    {
        return new PrepaidTransaction(
            uuid: $data->uuid,
            amountInCents: $data->amount_in_cents,
            prepaidBalance: PrepaidBalanceMapper::map($data->prepaid_balance),
            createdAt: $data->created_at,
            shop: $data->shop
                ? BusinessProfileMapper::map($data->shop)
                : null,
            contactIdentifier: $data->contact_identifier
                ? ContactIdentifierMapper::map($data->contact_identifier)
                : null,
            contact: ContactMapper::map($data->contact)
        );
    }
}
