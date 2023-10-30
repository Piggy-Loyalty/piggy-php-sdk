# Changelog

## 3.2.0

### Oauth

**NEW Domains**:

- **Authentication**:
    - feat: New way to authenticate using the API key generated from our business dashboard. Use `OAuthClientApiKey` class to pass the API key as an argument.

- **Collectable Rewards**:
    - feat: Added `list` and `collect` calls.
  
- **Portal Sessions**:
  - feat: Added `create` and `get` calls.

- **Webhook Subscriptions**:
  - feat: Added `list`, `create`, `get` (show), `update`, and `delete` calls.

- **Vouchers**:
  - feat: Added `create`, `list`, `findByCode`, `redeem`, `lock`, `release`, and `batch` methods.

- **Promotions**:
  - feat: Added `list` and `create` calls.
  
- **Promotion Attributes**:
  - feat: Added `list`, `get`, `create`, and `update` calls.

- **Forms**:
  - feat: Added `list` call.

- **Tiers**:
  - feat: Added `list` call.

- **BrandKit**:
  - feat: Added `get` call.

- **Contacts Portal**:
  - feat: Added `get` call.

- **Loyalty Transaction Attributes**:
  - feat: Added `list` and `create` calls.

**Existing Domains**:

- **Contacts**:
    - feat: Added `createAsync`, `findOrCreateAsync`, `delete`, `claimAnonymousContact`, and `getTier`.

- **Contact Verification**:
  - feat: Added `getAuthToken` for contact verification.

- **Giftcard Transactions**:
  - feat: Added `list` call.

  
## 3.1.0
### Oauth
- feat: option to calculate the number of credits that would be issued with the given values without creating a Credit Reception. 
- feat: able to show al Giftcard Programs for an account.
- feat: option to link an existing, unlinked Contact Identifier to an existing Contact.
- feat: option to create and claim both unit-based and credit-based Loyalty Token. 
- feat: possible to list all Reward Attributes as well as create a single one. This is also possible for Contact Attributes.

### Register 
- [in development]


## 3.0.4
- feat: option to get Loyalty Program (and see settings)
- feat: update Reward calls for Register and OAuth Client added. Can update custom Reward Attributes too.

## 3.0.3
- feat: option to send loyalty transaction custom attributes with the create credit reception requests for both oauth and register client 

## 3.0.2

- potential breaking: at time of fix, no clients were found using the create credit reception api call without using the Contact UUID. Create credit reception call now requires the Contact UUID, while the Contact Identifier value is now optional.
- fix: unit value is now a float for create credit reception
- feat: option to send pos transactions uuid with create credit reception, to link them

## 3.0.1

- fix: Giftcards were missing the amount in cents. That is fixed now.

## 3.0.0

Release version

## 3.0.0-beta2

- breaking: Giftcard transactions (OAuth Client) now uses `amount_in_cents` input

## 3.0.0-beta1

- feat: first beta release for version 3. Replacing old models with new ones and implemented API calls for both OAuth Clients as Registers.

## 1.1.0

- feat: handle maintenance mode response

## 1.0.0

 First stable version.

- feat: Giftcard API calls added
- breaking: Most params for API calls are no longer Objects from this package, but are now just primitive types. If you used v0.0.1, please make sure you update.

## 0.0.1 - 0.0.11

- Initial versions.