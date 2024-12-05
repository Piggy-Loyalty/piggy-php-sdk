<?php

namespace Piggy\Api\Endpoints;

use DateTime;
use DateTimeInterface;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Bookings\BookingMapper;
use Piggy\Api\Models\Booking\Booking;
use stdClass;
use UnexpectedValueException;

class BookingsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'bookings';

    /**
     * Create a new booking.
     *
     * @throws PiggyRequestException
     */
    public function create(
        string $contactUuid,
        string $businessProfileUuid,
        DateTime $startsAt,
        DateTime $endsAt,
        DateTime $checkedInAt,
        string $externalId,
        int $numberOfPeople,
        string $companyName,
        string $status,
        int $prepaidAmount,
        string $source
    ): Booking {
        $response = $this->client->post($this->resourceUri, [
            'contact_uuid' => $contactUuid,
            'business_profile_uuid' => $businessProfileUuid,
            'starts_at' => $startsAt->format(DateTimeInterface::ATOM),
            'ends_at' => $endsAt->format(DateTimeInterface::ATOM),
            'checked_in_at' => $checkedInAt->format(DateTimeInterface::ATOM),
            'external_id' => $externalId,
            'number_of_people' => $numberOfPeople,
            'company_name' => $companyName,
            'status' => $status,
            'prepaid_amount' => $prepaidAmount,
            'source' => $source,
        ]);

        $responseData = $response->getData();

        if (! $responseData instanceof stdClass) {
            throw new UnexpectedValueException('Expected response data to be of type stdClass.');
        }

        return (new BookingMapper)
            ->map($responseData);
    }

    /**
     * Update an existing booking.
     *
     * @throws PiggyRequestException
     */
    public function update(
        string $bookingUuid,
        DateTime $startsAt,
        DateTime $endsAt,
        DateTime $checkedInAt,
        string $externalId,
        int $numberOfPeople,
        string $companyName,
        string $status,
        int $prepaidAmount,
        string $source
    ): Booking {
        $response = $this->client->put("$this->resourceUri/$bookingUuid", [
            'booking_uuid' => $bookingUuid,
            'starts_at' => $startsAt->format(DateTimeInterface::ATOM),
            'ends_at' => $endsAt->format(DateTimeInterface::ATOM),
            'checked_in_at' => $checkedInAt->format(DateTimeInterface::ATOM),
            'external_id' => $externalId,
            'number_of_people' => $numberOfPeople,
            'company_name' => $companyName,
            'status' => $status,
            'prepaid_amount' => $prepaidAmount,
            'source' => $source,
        ]);

        $responseData = $response->getData();

        if (! $responseData instanceof stdClass) {
            throw new UnexpectedValueException('Expected response data to be of type stdClass.');
        }

        return (new BookingMapper)
            ->map($responseData);
    }
}
