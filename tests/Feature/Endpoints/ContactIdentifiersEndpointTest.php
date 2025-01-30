<?php

use Piggy\Api\Endpoints\ContactIdentifiersEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\Contact\ContactIdentifierFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new ContactIdentifiersEndpoint($this->mockClient);
    $this->faker = Faker\Factory::create();
});

it('successfully creates a new contact identifier', function () {
    $contactIdentifierFactory = new ContactIdentifierFactory;

    $contactIdentifier = $contactIdentifierFactory->toModel();
    $mockResponseData = $contactIdentifierFactory->toObject();

    // Mock request parameters
    $requestParams = [
        'name' => $contactIdentifier->getName(),
        'value' => $contactIdentifier->getValue(),
        'active' => $contactIdentifier->isActive(),
        'contact_uuid' => $contactIdentifier->getContactUuid(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the post method
    $this->mockClient
        ->shouldReceive('post')
        ->with('contact-identifiers', Mockery::any())
        ->andReturn($this->mockResponse);

    // Call the create method
    $retrievedContactIdentifier = $this->endpoint->create(...array_values($requestParams));

    // Assert the retrieved contact identifier matches the original one
    expect($retrievedContactIdentifier)->toEqual($contactIdentifier);
});

it('successfully retrieves a contact identifier', function () {
    $contactIdentifierFactory = new ContactIdentifierFactory;

    $contactIdentifier = $contactIdentifierFactory->toModel();
    $mockResponseData = $contactIdentifierFactory->toObject();

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with("contact-identifiers/{$contactIdentifier->getValue()}")
        ->andReturn($this->mockResponse);

    // Call the show method
    $retrievedContactIdentifier = $this->endpoint->show($contactIdentifier->getValue());

    // Assert the retrieved contact identifier matches the original one
    expect($retrievedContactIdentifier)->toEqual($contactIdentifier);
});

it('successfully updates a contact identifier', function () {
    $contactIdentifierFactory = new ContactIdentifierFactory;

    $contactIdentifier = $contactIdentifierFactory->toModel();
    $mockResponseData = $contactIdentifierFactory->toObject();

    // Mock request parameters
    $requestParams = [
        'name' => $this->faker->word(),
        'active' => $this->faker->boolean(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the put method
    $this->mockClient
        ->shouldReceive('put')
        ->with(Mockery::any(), Mockery::any())
        ->andReturn($this->mockResponse);

    // Call the update method
    $retrievedContactIdentifier = $this->endpoint->update($contactIdentifier->getValue(), ...array_values($requestParams));

    // Assert the retrieved contact identifier matches the original one
    expect($retrievedContactIdentifier)->toEqual($contactIdentifier);
});

it('successfully deletes a contact identifier', function () {
    $contactValue = $this->faker->uuid();

    // Mock the delete method (it does not return data, but we must return a mock Response object)
    $this->mockClient
        ->shouldReceive('delete')
        ->with("contact-identifiers/{$contactValue}")
        ->andReturn(Mockery::mock(Response::class)); // Ensure a Response object is returned

    // Call the delete method
    $result = $this->endpoint->delete($contactValue);

    // Assert that it returns `true`
    expect($result)->toBeTrue();
});

it('throws an exception if the response data for create is invalid', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the post method
    $this->mockClient
        ->shouldReceive('post')
        ->with('contact-identifiers', Mockery::any())
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->create(
        'test-value',
        'test-name',
        true,
        'contact-uuid'
    );
});

it('throws an exception if the response data for show is invalid', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('contact-identifiers/test-value')
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->show('test-value');
});

it('throws a PiggyRequestException on API error for create', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('post')->with('contact-identifiers', Mockery::any())->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the create method
    $this->endpoint->create('test-value', 'test-name', true, 'contact-uuid');
})->throws(PiggyRequestException::class, 'API error');

it('throws a PiggyRequestException on API error for show', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('contact-identifiers/test-value')->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the show method
    $this->endpoint->show('test-value');
})->throws(PiggyRequestException::class, 'API error');

it('throws a PiggyRequestException on API error for update', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('put')->with(Mockery::any(), Mockery::any())->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the update method
    $this->endpoint->update('test-value', 'new-name', false);
})->throws(PiggyRequestException::class, 'API error');

it('throws a PiggyRequestException on API error for delete', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('delete')->with('contact-identifiers/test-value')->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the delete method
    $this->endpoint->delete('test-value');
})->throws(PiggyRequestException::class, 'API error');
