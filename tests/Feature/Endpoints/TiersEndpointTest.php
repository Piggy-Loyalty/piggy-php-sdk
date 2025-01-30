<?php

use Piggy\Api\Endpoints\TiersEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\TierFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new TiersEndpoint($this->mockClient);
});

it('successfully retrieves a list of tiers', function () {
    $tiers = [];

    $tiers[0] = (new TierFactory)->toModel();
    $tiers[1] = (new TierFactory)->toModel();

    // Mock response data
    $mockResponseData = [
        $tiers[0]->toObject(),
        $tiers[1]->toObject(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('tiers', [])
        ->andReturn($this->mockResponse);

    // Call the list method
    $retrievedTiers = $this->endpoint->list();

    expect($retrievedTiers[0])
        ->toEqual($tiers[0]);

    expect($retrievedTiers[1])
        ->toEqual($tiers[1]);
});

it('throws an exception if the response data is not an array', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('tiers', [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type array.');

    $this->endpoint->list();
});

it('throws a PiggyRequestException on API error', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('tiers', [])->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the list method
    $this->endpoint->list();
})->throws(PiggyRequestException::class, 'API error');
