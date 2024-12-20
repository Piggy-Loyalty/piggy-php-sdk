<?php

namespace Piggy\Api\Endpoints;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Contacts\CollectableRewards\CollectableRewardCollectionMapper;
use Piggy\Api\Mappers\Contacts\CollectableRewards\CollectableRewardMapper;
use Piggy\Api\Models\Contact\CollectableReward;
use Piggy\Api\Traits\Endpoints\ResponseToModelCollectionMapper;
use Piggy\Api\Traits\Endpoints\ResponseToModelMapper;

class CollectableRewardsEndpoint extends BaseEndpoint
{
    /** @template-use ResponseToModelCollectionMapper<CollectableReward> */
    use ResponseToModelCollectionMapper;

    /** @template-use ResponseToModelMapper<CollectableReward> */
    use ResponseToModelMapper;

    protected string $resourceUri = 'contacts';

    /**
     * List all collectable rewards for a contact.
     *
     * @param  mixed[]  $params
     * @return CollectableReward[]
     *
     * @throws PiggyRequestException
     */
    public function list(string $contactUuid, array $params = []): array
    {
        $response = $this->client->get("$this->resourceUri/$contactUuid/collectable-rewards", $params);

        return self::mapToList(
            response: $response,
            mapper: CollectableRewardCollectionMapper::class
        );
    }

    /**
     * Collect a reward for a contact.
     *
     * @throws PiggyRequestException
     */
    public function collect(string $contactUuid, string $loyaltyTransactionUuid): CollectableReward
    {
        $response = $this->client->put("$this->resourceUri/$contactUuid/collectable-rewards/collect/$loyaltyTransactionUuid");

        return self::mapToModel(
            response: $response,
            mapper: CollectableRewardMapper::class
        );
    }
}
