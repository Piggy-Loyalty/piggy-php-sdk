<?php

namespace Piggy\Api\Models\PrepaidTransaction;

use Piggy\Api\Models\BaseModel;

readonly class Contact extends BaseModel
{
    public function __construct(
        public ?string $uuid,
        public string $email,
    ) {
        //
    }
}
