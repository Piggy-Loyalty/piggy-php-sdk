<?php

use Piggy\Api\Endpoints\AutomationsEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\AutomationFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new AutomationsEndpoint($this->mockClient);
});

it('successfully retrieves a list of automations', function () {
    $automations = [];

    $automations[0] = (new AutomationFactory)->toModel();
    $automations[1] = (new AutomationFactory)->toModel();

    // Mock response data
    $mockResponseData = [
        $automations[0]->toObject(),
        $automations[1]->toObject(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('automations', [])
        ->andReturn($this->mockResponse);

    // Call the list method
    $retrievedAutomations = $this->endpoint->list();

    expect($retrievedAutomations[0])
        ->toEqual($automations[0]);

    expect($retrievedAutomations[1])
        ->toEqual($automations[1]);
});

it('successfully creates a new automation run', function () {
    $contactUuid = 'contact-uuid';
    $automationUuid = 'automation-uuid';
    $mockResponseData = 'automation-run-uuid';

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the post method
    $this->mockClient
        ->shouldReceive('post')
        ->with('automations/runs', [
            'contact_uuid' => $contactUuid,
            'automation_uuid' => $automationUuid,
            'data' => null,
        ])
        ->andReturn($this->mockResponse);

    // Call the create method
    $createdAutomationRunUuid = $this->endpoint->create($contactUuid, $automationUuid);

    // Assert the created automation run UUID matches the expected value
    expect($createdAutomationRunUuid)->toBe($mockResponseData);
});

it('throws an exception if the response data for list is not an array', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('automations', [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type array.');

    $this->endpoint->list();
});

it('throws an exception if the response data for create is not a string', function () {
    $contactUuid = 'contact-uuid';
    $automationUuid = 'automation-uuid';

    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn(['unexpected' => 'data']);

    // Mock the post method
    $this->mockClient
        ->shouldReceive('post')
        ->with('automations/runs', [
            'contact_uuid' => $contactUuid,
            'automation_uuid' => $automationUuid,
            'data' => null,
        ])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type string.');

    $this->endpoint->create($contactUuid, $automationUuid);
});

it('throws a PiggyRequestException on API error for list', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('automations', [])->andThrow(
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

it('throws a PiggyRequestException on API error for create', function () {
    $contactUuid = 'contact-uuid';
    $automationUuid = 'automation-uuid';

    // Mock an API error
    $this->mockClient->shouldReceive('post')->with('automations/runs', Mockery::any())->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the create method
    $this->endpoint->create($contactUuid, $automationUuid);
})->throws(PiggyRequestException::class, 'API error');
