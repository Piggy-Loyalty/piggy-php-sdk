<?php

namespace Piggy\Api\Enums;

enum AutomationEventType: string
{
    case ORDER_PAID = 'order_paid';
    case TIER_REACHED = 'tier_reached';
    case VISIT_CREATED = 'visit_created';
    case CONTACT_CREATED = 'contact_created';
    case CONTACT_UPDATED = 'contact_updated';
    case BOOKING_CREATED = 'booking_created';
    case BOOKING_UPDATED = 'booking_updated';
    case VOUCHER_REDEEMED = 'voucher_redeemed';
    case VOUCHER_CREATED = 'voucher_created';
    case CREDIT_RECEPTION_CREATED = 'credit_reception_created';
    case FORM_SUBMISSION_APPROVED = 'form_submission_approved';
    case FORM_SUBMISSION_REJECTED = 'form_submission_rejected';
    case CREDIT_BALANCE_INCREASED = 'credit_balance_increased';
    case FORM_SUBMISSION_COMPLETED = 'form_submission_completed';
    case PREPAID_TRANSACTION_CREATED = 'prepaid_transaction_created';
    case REFERRAL_COMPLETED_BY_CONTACT = 'referral_completed_by_contact';
    case REFERRAL_COMPLETED_FOR_CONTACT = 'referral_completed_for_contact';
    case DIGITAL_REWARD_RECEPTION_CREATED = 'digital_reward_reception_created';
    case PHYSICAL_REWARD_RECEPTION_CREATED = 'physical_reward_reception_created';
}
