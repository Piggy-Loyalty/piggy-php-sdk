<?php

namespace Piggy\Api\Enums;

enum AutomationStatus: string
{
    case ACTIVE = 'active';

    case INACTIVE = 'inactive';

    case PENDING_DELETION = 'PENDING_DELETION';

    case HAS_ERRORS = 'errors';
}
