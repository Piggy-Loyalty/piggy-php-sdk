<?php

namespace Piggy\Api\Enums;

enum IncentiveType: string
{
    case LOYALTY_CREDIT = 'loyalty_credit';

    case PREPAID_CREDIT = 'prepaid_credit';

    case VOUCHER = 'voucher';

    case NOTHING = 'nothing';
}
