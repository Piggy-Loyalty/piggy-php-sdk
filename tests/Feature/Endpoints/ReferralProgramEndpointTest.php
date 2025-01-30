<?php

use Piggy\Api\Endpoints\ReferralProgramEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\Referral\ReferralProgramFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new ReferralProgramEndpoint($this->mockClient);
});

it('successfully retrieves the referral program', function () {
    $referralProgramFactory = new ReferralProgramFactory;

    $referralProgram = $referralProgramFactory->toModel();
    $mockResponseData = $referralProgramFactory->toObject();

    // Mock the response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('referral-program', [])
        ->andReturn($this->mockResponse);

    $retrievedProgram = $this->endpoint->get();

    // Assert the retrieved program matches the original program
    expect($retrievedProgram)->toEqual($referralProgram);
});

it('throws an exception if the response data is invalid', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('referral-program', [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->get();
});

it('throws a PiggyRequestException on API error', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('referral-program', [])->andThrow(
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
