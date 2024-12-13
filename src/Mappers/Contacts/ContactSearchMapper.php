<?php

namespace Piggy\Api\Mappers\Contacts;

use Piggy\Api\Enums\Channel;
use Piggy\Api\Enums\ContactStatus;
use Piggy\Api\Mappers\BaseModelMapper;
use Piggy\Api\Models\Contact\ContactSearch;
use Piggy\Api\Services\DateParserService;
use stdClass;

/**
 * @extends BaseModelMapper<ContactSearch>
 */
class ContactSearchMapper extends BaseModelMapper
{
    public static function map(stdClass $data): ContactSearch
    {
        return new ContactSearch(
            id: $data->id,
            uuid: $data->uuid,
            email: $data->email,
            contactId: $data->contact_id,
            currentTier: $data->current_tier,
            avatar: $data->avatar,
            firstName: $data->firstname,
            lastName: $data->lastname,
            address: $data->address,
            phoneNumber: $data->phonenumber,
            birthdate: $data->birthdate
                ? DateParserService::parse($data->birthdate)
                : null,
            channel: Channel::tryFrom($data->channel) ?? $data->channel,
            age: $data->age,
            locale: $data->locale,
            status: defined(ContactStatus::class."::$data->status")
                ? constant(ContactStatus::class."::$data->status")
                : null,
            updatedAt: $data->updated_at
                ? DateParserService::parse($data->updated_at)
                : null,
            createdAt: $data->created_at
                ? DateParserService::parse($data->created_at)
                : null,
            isAnonymous: $data->is_anonymous,
            creditBalance: $data->credit_balance,
            prepaidBalance: $data->prepaid_balance,
            loyaltyAssociatedShops: json_decode($data->loyalty_associated_shops),
            loyaltyTotalPurchaseAmount: $data->loyalty_total_purchase_amount,
            previousLoyaltyBalance: $data->previous_loyalty_balance,
            loyaltyFirstTransactionDate: $data->loyalty_first_transaction_date
                ? DateParserService::parse($data->loyalty_first_transaction_date)
                : null,
            loyaltyLastTransactionDate: $data->loyalty_last_transaction_date
                ? DateParserService::parse($data->loyalty_last_transaction_date)
                : null,
            loyaltyNumberOfTransactions: $data->loyalty_number_of_transactions,
            loyaltyTotalCreditsReceived: $data->loyalty_total_credits_received,
            defaultContactIdentifier: $data->default_contact_identifier,
            tier: $data->tier,
            presentInImports: $data->present_in_imports,
            listMemberships: $data->list_memberships
        );
    }
}
