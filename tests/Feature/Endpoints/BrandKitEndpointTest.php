<?php

use Piggy\Api\Endpoints\BrandKitEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\BrandKitFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);

    $this->mockResponse = Mockery::mock(Response::class);

    $this->endpoint = new BrandKitEndpoint($this->mockClient);
});

it('successfully retrieves the brand kit', function () {
    $brandKitFactory = new BrandKitFactory;

    $brandKit = $brandKitFactory->toModel();
    $mockResponseData = $brandKitFactory->toObject();

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('brand-kit', [])
        ->andReturn($this->mockResponse);

    // Call the get method
    $retrievedBrandKit = $this->endpoint->get();

    // Assert the retrieved brand kit matches the original brand kit
    expect($retrievedBrandKit)->toEqual($brandKit);
});

it('throws an exception if the response data is invalid', function () {
    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('brand-kit', [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->get();
});

it('throws a PiggyRequestException on API error', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('brand-kit', [])->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the get method
    $this->endpoint->get();
})->throws(PiggyRequestException::class, 'API error');
