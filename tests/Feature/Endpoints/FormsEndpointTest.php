<?php

use Piggy\Api\Endpoints\FormsEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\FormFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new FormsEndpoint($this->mockClient);
});

it('successfully retrieves a list of forms', function () {
    $forms = [];

    $forms[0] = (new FormFactory)->toModel();
    $forms[1] = (new FormFactory)->toModel();

    // Mock response data
    $mockResponseData = [
        $forms[0]->toObject(),
        $forms[1]->toObject(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('forms', [])
        ->andReturn($this->mockResponse);

    // Call the list method
    $retrievedForms = $this->endpoint->list();

    expect($retrievedForms[0])
        ->toEqual($forms[0]);

    expect($retrievedForms[1])
        ->toEqual($forms[1]);
});

it('throws an exception if the response data is not an array', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('forms', [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type array.');

    $this->endpoint->list();
});

it('throws a PiggyRequestException on API error', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('forms', [])->andThrow(
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
