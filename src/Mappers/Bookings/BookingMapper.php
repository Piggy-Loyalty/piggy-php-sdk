<?php

namespace Piggy\Api\Mappers\Bookings;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Booking\Booking;
use Piggy\Api\Models\Booking\Contact;
use stdClass;

class BookingMapper extends BaseModelMapper
{
    public function map(stdClass $data): Booking
    {
        return new Booking(
            new Contact(
                $data->contact->uuid,
                $data->contact->email
            ),
            $this->parseDate($data->starts_at),
            $this->parseDate($data->ends_at),
            $this->parseDate($data->checked_in_at),
            $data->external_id,
            $data->source,
            $data->number_of_people,
            $data->company_name,
            $data->prepaid_amount
        );
    }
}
