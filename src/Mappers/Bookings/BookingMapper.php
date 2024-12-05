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
            startsAt: $this->parseDate($data->starts_at),
            endsAt: $this->parseDate($data->ends_at),
            checkedInAt: $this->parseDate($data->checked_in_at),
            externalId: $data->external_id,
            source: $data->source,
            numberOfPeople: $data->number_of_people,
            companyName: $data->company_name,
            prepaidAmount: $data->prepaid_amount
        );
    }
}
