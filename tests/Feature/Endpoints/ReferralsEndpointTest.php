<?php

use Piggy\Api\Endpoints\ReferralsEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\Referral\ReferralFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new ReferralsEndpoint($this->mockClient);
});

it('successfully retrieves a list of referrals', function () {
    $referrals = [];

    $referrals[0] = (new ReferralFactory)->toModel();
    $referrals[1] = (new ReferralFactory)->toModel();

    // Mock response data
    $mockResponseData = [
        $referrals[0]->toObject(),
        $referrals[1]->toObject(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('referrals', [])
        ->andReturn($this->mockResponse);

    // Call the list method
    $retrievedReferrals = $this->endpoint->list();

    expect($retrievedReferrals[0])
        ->toEqual($referrals[0]);

    expect($retrievedReferrals[1])
        ->toEqual($referrals[1]);
});

it('throws an exception if the response data is not an array', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the get method
    $this->mockClient
        ->shouldReceive('get')
        ->with('referrals', [])
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type array.');

    $this->endpoint->list();
});

it('throws a PiggyRequestException on API error', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('get')->with('referrals', [])->andThrow(
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
