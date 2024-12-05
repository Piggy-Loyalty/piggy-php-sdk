<?php

namespace Piggy\Api\Enums;

enum CompletionEvent: string
{
    case CONTACT_CREATION = 'contact_creation';
    case FIRST_LOYALTY_TRANSACTION = 'first_loyalty_transaction';
}
