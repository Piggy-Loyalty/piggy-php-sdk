<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\PrepaidTransactions\PrepaidTransactionCollectionMapper;
use Piggy\Api\Mappers\PrepaidTransactions\PrepaidTransactionMapper;
use Piggy\Api\Models\PrepaidTransaction\PrepaidTransaction;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class PrepaidTransactionsEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<PrepaidTransactionMapper> */
    use ResponseToModelCollectionMapper;

    /** @template-use ResponseToModelMapper<PrepaidTransactionMapper> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'prepaid-transactions';

    /**
     * List all prepaid transactions.
     *
     * @param  mixed[]  $params
     * @return PrepaidTransactionMapper[]
     *
     * @throws PiggyRequestException
     */
    public function list(array $params = []): array
    {
        $response = $this->client->get($this->resourceUri, $params);

        return self::mapToList(
            response: $response,
            mapper: PrepaidTransactionCollectionMapper::class
        );
    }

    /**
     * @param  ?string  $contactUuid  Required without contactIdentifierValue
     * @param  ?string  $contactIdentifierValue  Required without contactUuid
     *
     * @throws PiggyRequestException
     */
    public function create(
        string $businessProfileUuid,
        int $amountInCents,
        ?string $contactUuid = null,
        ?string $contactIdentifierValue = null,
    ): PrepaidTransaction {
        $response = $this->client->post($this->resourceUri, [
            'business_profile_uuid' => $businessProfileUuid,
            'contact_uuid' => $contactUuid,
            'contact_identifier_value' => $contactIdentifierValue,
            'amount_in_cents' => $amountInCents,
        ]);

        return self::mapToModel(
            response: $response,
            mapper: PrepaidTransactionMapper::class
        );
    }

    /**
     * @throws PiggyRequestException
     */
    public function reverse(string $uuid): PrepaidTransaction
    {
        $response = $this->client->post("$this->resourceUri/$uuid/reverse");

        return self::mapToModel(
            response: $response,
            mapper: PrepaidTransactionMapper::class
        );
    }
}
