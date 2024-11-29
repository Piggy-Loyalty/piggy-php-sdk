<?php

namespace Piggy\Api\Endpoints;

use DateTime;
use DateTimeInterface;
use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Mappers\Bookings\BookingMapper;
use Piggy\Api\Models\Booking\Booking;

class BookingsEndpoint extends BaseEndpoint
{
    protected string $resourceUri = 'bookings';

    /**
     * @throws PiggyRequestException
     */
    public function create(
        string $contactUuid,
        string $businessProfileUuid,
        DateTime $startsAt,
        DateTime $endsAt,
        DateTime $checkedInAt,
        string $externalId,
        int    $numberOfPeople,
        string $companyName,
        string $status,
        int    $prepaidAmount,
        string $source
    ): Booking
    {
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

        $mapper = new BookingMapper;

        return $mapper->map($response->getData());
    }
}
