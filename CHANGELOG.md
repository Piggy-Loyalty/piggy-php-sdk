# Changelog

## 3.1.0
### Oauth
- feat: option to calculate the number of credits would be issued with the given values without creating a Credit Reception. 
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