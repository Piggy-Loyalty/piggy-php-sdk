<?php

namespace Piggy\Api\Enums;

enum Channel: int
{
    case BUSINESS_APP = 0;

    case API = 1;

    case BUSINESS_DASHBOARD = 2;

    case SHARE_EXTENSION = 3;

    case CUSTOMER_APP = 4;

    case WEBSHOP_API = 5;

    case IMPORT = 6;

    case WEBSITE_FORM = 7;

    case TRIGGERED_CAMPAIGN = 8;

    case REGISTER_API = 9;

    case OAUTH_API = 10;

    case ONE_OFF_EMAIL = 11;

    case TOKEN = 12;

    case SUBSCRIPTION_TYPE = 13;

    case CUSTOM_APP = 14;

    case AUTOMATIONS = 15;

    case FORMS = 16;

    case UNKNOWN = 17;

    case WIDGET = 18;

    case PERIODIC_CAMPAIGN = 19;

    case STANDARD_CAMPAIGN = 20;

    case SHOPIFY = 21;

    case LIGHT_SPEED = 22;

    case BIGCOMMERCE = 23;

    case WOOCOMMERCE = 24;

    case ADMIN = 25;

    case MERGE = 26;

    case PORTAL_SESSION = 27;

    case REFERRAL = 28;

    case FORMITABLE = 29;

    case MOLLIE = 30;

    case STRIPE = 31;

    case MICE = 32;

    case CASPECO_BOOKINGS = 33;

    case LIGHT_SPEED_K_SERIES = 34;

    case PUBLIC_API_V4 = 35;

    case KLAVIYO = 36;

    case CAMPAIGN = 37;

    case SYSTEM = 38;

    case TOAST = 39;
}
