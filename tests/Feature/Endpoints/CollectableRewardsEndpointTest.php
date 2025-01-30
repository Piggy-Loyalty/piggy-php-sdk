<?php

use Piggy\Api\Endpoints\CollectableRewardsEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\Contact\CollectableRewardFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new CollectableRewardsEndpoint($this->mockClient);
});

it('successfully retrieves a list of collectable rewards for a contact', function () {
    $contactUuid = 'contact-uuid';
    $collectableRewards = [];

    $collectableRewards[0] = (new CollectableRewardFactory)->toModel();
    $collectableRewards[1] = (new CollectableRewardFactory)->toModel();

    // Mock response data
    $mockResponseData = [
        $collectableRewards[0]->toObject(),
        $collectableRewards[1]->toObject(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with("contacts/{$contactUuid}/collectable-rewards", [])
        ->andReturn($this->mockResponse);

    // Call the list method
    $retrievedCollectableRewards = $this->endpoint->list($contactUuid);

    expect($retrievedCollectableRewards[0])
        ->toEqual($collectableRewards[0]);

    expect($retrievedCollectableRewards[1])
        ->toEqual($collectableRewards[1]);
});

it('successfully collects a reward for a contact', function () {
    $contactUuid = 'contact-uuid';
    $loyaltyTransactionUuid = 'transaction-uuid';

    $collectableRewardFactory = new CollectableRewardFactory;
    $collectableReward = $collectableRewardFactory->toModel();
    $mockResponseData = $collectableRewardFactory->toObject();

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the put method
    $this->mockClient
        ->shouldReceive('put')
        ->with("contacts/{$contactUuid}/collectable-rewards/collect/{$loyaltyTransactionUuid}")
        ->andReturn($this->mockResponse);

    // Call the collect method
    $retrievedCollectableReward = $this->endpoint->collect($contactUuid, $loyaltyTransactionUuid);

    // Assert the retrieved collectable reward matches the original collectable reward
    expect($retrievedCollectableReward)->toEqual($collectableReward);
});

it('throws an exception if the response data for list is not an array', function () {
    $contactUuid = 'contact-uuid';

    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with("contacts/{$contactUuid}/collectable-rewards", [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type array.');

    $this->endpoint->list($contactUuid);
});

it('throws an exception if the response data for collect is invalid', function () {
    $contactUuid = 'contact-uuid';
    $loyaltyTransactionUuid = 'transaction-uuid';

    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the put method
    $this->mockClient
        ->shouldReceive('put')
        ->with("contacts/{$contactUuid}/collectable-rewards/collect/{$loyaltyTransactionUuid}")
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->collect($contactUuid, $loyaltyTransactionUuid);
});

it('throws a PiggyRequestException on API error for list', function () {
    $contactUuid = 'contact-uuid';

    // Mock an API error
    $this->mockClient->shouldReceive('get')->with("contacts/{$contactUuid}/collectable-rewards", [])->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the list method
    $this->endpoint->list($contactUuid);
})->throws(PiggyRequestException::class, 'API error');

it('throws a PiggyRequestException on API error for collect', function () {
    $contactUuid = 'contact-uuid';
    $loyaltyTransactionUuid = 'transaction-uuid';

    // Mock an API error
    $this->mockClient->shouldReceive('put')->with("contacts/{$contactUuid}/collectable-rewards/collect/{$loyaltyTransactionUuid}")->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the collect method
    $this->endpoint->collect($contactUuid, $loyaltyTransactionUuid);
})->throws(PiggyRequestException::class, 'API error');
