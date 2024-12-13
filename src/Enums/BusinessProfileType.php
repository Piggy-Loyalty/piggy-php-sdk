<?php

namespace Piggy\Api\Enums;

enum BusinessProfileType: string
{
    case WEBSHOP = 'webshop';

    case ON_SITE = 'on_site';

    case DEPARTMENT = 'department';

    case ROOM = 'room';

    case HEADQUARTERS = 'headquarters';

    case POINT_OF_SALE = 'point_of_sale';
}
