<?php

namespace Piggy\Api\Mappers\Bookings;

use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Booking\Booking;
use Piggy\Api\Models\Booking\Contact;
use Piggy\Api\Services\DateParserService;
use stdClass;

class BookingMapper extends BaseModelMapper
{
    public static function map(stdClass $data): Booking
    {
        return new Booking(
            $data->uuid,
            new Contact(
                $data->contact->uuid,
                $data->contact->email
            ),
            DateParserService::parse($data->starts_at),
            DateParserService::parse($data->ends_at),
            DateParserService::parse($data->checked_in_at),
            $data->external_id,
            $data->source,
            $data->number_of_people,
            $data->company_name,
            $data->prepaid_amount
        );
    }
}
