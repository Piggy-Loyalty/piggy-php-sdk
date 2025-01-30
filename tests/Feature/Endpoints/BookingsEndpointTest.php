<?php

use Piggy\Api\Endpoints\BookingsEndpoint;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Http\Response;
use Piggy\Api\Models\Booking\Booking;
use Piggy\Api\PiggyClient;
use Piggy\Api\Tests\Factories\Booking\BookingFactory;

beforeEach(function () {
    $this->mockClient = Mockery::mock(PiggyClient::class);
    $this->mockResponse = Mockery::mock(Response::class);
    $this->endpoint = new BookingsEndpoint($this->mockClient);
    $this->faker = Faker\Factory::create();
});

it('successfully creates a new booking', function () {
    $bookingFactory = new BookingFactory;

    /** @var Booking $booking */
    $booking = $bookingFactory->toModel();
    $mockResponseData = $bookingFactory->toObject();

    // Mock request parameters
    $requestParams = [
        'contact_uuid' => $booking->getContact()->getUuid(),
        'business_profile_uuid' => $this->faker->uuid(),
        'starts_at' => $booking->getStartsAt(),
        'ends_at' => $booking->getEndsAt(),
        'checked_in_at' => $booking->getCheckedInAt(),
        'external_id' => $booking->getExternalId(),
        'number_of_people' => $booking->getNumberOfPeople(),
        'company_name' => $booking->getCompanyName(),
        'status' => $this->faker->word(),
        'prepaid_amount' => $booking->getPrepaidAmount(),
        'source' => $booking->getSource(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the post method
    $this->mockClient
        ->shouldReceive('post')
        ->with('bookings', Mockery::any())
        ->andReturn($this->mockResponse);

    // Call the create method
    $retrievedBooking = $this->endpoint->create(...array_values($requestParams));

    // Assert the retrieved booking matches the original booking
    expect($retrievedBooking)->toEqual($booking);
});

it('successfully updates an existing booking', function () {
    $bookingFactory = new BookingFactory;

    /** @var Booking $booking */
    $booking = $bookingFactory->toModel();
    $mockResponseData = $bookingFactory->toObject();

    // Mock request parameters
    $requestParams = [
        'contact_uuid' => $booking->getContact()->getUuid(),
        'starts_at' => $booking->getStartsAt(),
        'ends_at' => $booking->getEndsAt(),
        'checked_in_at' => $booking->getCheckedInAt(),
        'external_id' => $booking->getExternalId(),
        'number_of_people' => $booking->getNumberOfPeople(),
        'company_name' => $booking->getCompanyName(),
        'status' => $this->faker->word(),
        'prepaid_amount' => $booking->getPrepaidAmount(),
        'source' => $booking->getSource(),
    ];

    // Mock the response
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn($mockResponseData);

    // Mock the put method
    $this->mockClient
        ->shouldReceive('put')
        ->with(Mockery::pattern('/^bookings\/[a-z0-9-]+$/i'), Mockery::any()) // Match the booking endpoint with any UUID
        ->andReturn($this->mockResponse);

    // Call the update method
    $retrievedBooking = $this->endpoint->update(...array_values($requestParams));

    // Assert the retrieved booking matches the original booking
    expect($retrievedBooking)->toEqual($booking);
});

it('throws an exception if the response data for create is invalid', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the post method
    $this->mockClient
        ->shouldReceive('post')
        ->with('bookings', Mockery::any())
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->create(
        'contact-uuid',
        'business-profile-uuid',
        new DateTimeImmutable,
        new DateTimeImmutable,
        new DateTimeImmutable,
        'external-id',
        2,
        'Test Company',
        'confirmed',
        1000,
        'website'
    );
});

it('throws an exception if the response data for update is invalid', function () {
    // Mock invalid response data
    $this->mockResponse
        ->shouldReceive('getData')
        ->andReturn('invalid data');

    // Mock the put method
    $this->mockClient
        ->shouldReceive('put')
        ->with('bookings/booking-uuid', Mockery::any())
        ->andReturn($this->mockResponse);

    // Expect an exception
    $this->expectException(UnexpectedValueException::class);
    $this->expectExceptionMessage('Expected response data to be of type stdClass.');

    $this->endpoint->update(
        'booking-uuid',
        new DateTimeImmutable,
        new DateTimeImmutable,
        new DateTimeImmutable,
        'external-id',
        2,
        'Test Company',
        'confirmed',
        1000,
        'website'
    );
});

it('throws a PiggyRequestException on API error for create', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('post')->with('bookings', Mockery::any())->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the create method
    $this->endpoint->create(
        'contact-uuid',
        'business-profile-uuid',
        new DateTimeImmutable,
        new DateTimeImmutable,
        new DateTimeImmutable,
        'external-id',
        2,
        'Test Company',
        'confirmed',
        1000,
        'website'
    );
})->throws(PiggyRequestException::class, 'API error');

it('throws a PiggyRequestException on API error for update', function () {
    // Mock an API error
    $this->mockClient->shouldReceive('put')->with('bookings/booking-uuid', Mockery::any())->andThrow(
        new PiggyRequestException(
            message: 'API error',
            code: 0,
            statusCode: 500,
            errorBag: null
        )
    );

    // Call the update method
    $this->endpoint->update(
        'booking-uuid',
        new DateTimeImmutable,
        new DateTimeImmutable,
        new DateTimeImmutable,
        'external-id',
        2,
        'Test Company',
        'confirmed',
        1000,
        'website'
    );
})->throws(PiggyRequestException::class, 'API error');
