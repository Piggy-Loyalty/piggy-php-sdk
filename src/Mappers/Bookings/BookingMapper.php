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
            uuid: $data->uuid,
            contact: new Contact(
                uuid: $data->contact->uuid,
                email: $data->contact->email
            ),
            startsAt: $data->starts_at
                ? $this->parseDate($data->starts_at)
                : null,
            endsAt: $data->ends_at
                ? $this->parseDate($data->ends_at)
                : null,
            checkedInAt: $data->checked_in_at
                ? $this->parseDate($data->checked_in_at)
                : null,
            externalId: $data->external_id,
            source: $data->source,
            numberOfPeople: $data->number_of_people,
            companyName: $data->company_name,
            prepaidAmount: $data->prepaid_amount
        );
    }
}
