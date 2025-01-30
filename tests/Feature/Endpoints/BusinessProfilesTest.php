<?php

use Piggy\Api\Endpoints\BusinessProfilesEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\BusinessProfile\BusinessProfileFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new BusinessProfilesEndpoint($this->mockClient);
});

it('successfully retrieves a single business profile', function () {
    $businessProfileFactory = new BusinessProfileFactory;

    $businessProfile = $businessProfileFactory->toModel();
    $mockResponseData = $businessProfileFactory->toObject();

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with("business-profiles/{$businessProfile->getUuid()}")
        ->andReturn($this->mockResponse);

    // Call the show method
    $retrievedBusinessProfile = $this->endpoint->show($businessProfile->getUuid());

    // Assert the retrieved business profile matches the original business profile
    expect($retrievedBusinessProfile)->toEqual($businessProfile);
});

it('successfully retrieves a list of business profiles', function () {
    $businessProfiles = [];

    $businessProfiles[0] = (new BusinessProfileFactory)->toModel();
    $businessProfiles[1] = (new BusinessProfileFactory)->toModel();

    // Mock response data
    $mockResponseData = [
        $businessProfiles[0]->toObject(),
        $businessProfiles[1]->toObject(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('business-profiles', [])
        ->andReturn($this->mockResponse);

    // Call the list method
    $retrievedBusinessProfiles = $this->endpoint->list();

    expect($retrievedBusinessProfiles[0])
        ->toEqual($businessProfiles[0]);

    expect($retrievedBusinessProfiles[1])
        ->toEqual($businessProfiles[1]);
});

it('throws an exception if the response data for show is invalid', function () {
    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('business-profiles/some-uuid')
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->show('some-uuid');
});

it('throws an exception if the response data for list is not an array', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('business-profiles', [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type array.');

    $this->endpoint->list();
});

it('throws a PiggyRequestException on API error for show', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('business-profiles/some-uuid')->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the show method
    $this->endpoint->show('some-uuid');
})->throws(PiggyRequestException::class, 'API error');

it('throws a PiggyRequestException on API error for list', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('business-profiles', [])->andThrow(
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
