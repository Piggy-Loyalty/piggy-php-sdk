
# Piggy PHP SDK #  
With [Piggy's](https://www.piggy.eu/) all-in-one platform you can strengthen loyalty and automate every step. From reward programs, to branded giftcards and smart email marketing - Piggy takes care of it all.

You can use this package to connect your application / POS-system (Register) to a Piggy account. Please make sure to choose the right API Client for your needs.

Full documentation about our API can be found here https://docs.piggy.eu/

## Versions

You should use v3 of this SDK. However this is *not* backward compatible with v1.* of this SDK. 

## Requirements

This SDK requires PHP 7.2 or higher.
Currently our test suite runs against PHP 7.2, 7.3, 7.4, 8.0, 8.1

## Setup ##  

**Composer:**
```
composer require piggy/piggy-php-sdk
```

## Quickstart ##  

**Example with Register Client**  
```
$apiKey = 'xxxx-xxxx-xxxx';  
$client = new Piggy\Api\RegisterClient($apiKey);

try {
    $contact = $client->contacts->findOneBy('test@domain.com'); // Example call to find a Contact by e-mail address
} catch(Piggy\Api\Exceptions\MaintenanceModeException $e) {
    // Catch maintenance mode specific.
} catch(Piggy\Api\Exceptions\PiggyRequestException $e) {
    // If no Contact is found, you'd know that from this exception
} catch(\Exception $) {
    // Handle any other exceptions 
}

```

**Example with OAuth Client**  
```
$clientId = 'xxxx';
$clientSecret = 'xxx-xxxxxxx';    
$client = new Piggy\Api\OAuthClient($clientId, $clientSecret);  
$access_token = $client->getAccessToken();      
$client->setAccessToken($access_token);

try {
    $contact = $client->contacts->findOneBy('test@domain.com'); // Example call to find a Contact by e-mail address
} catch(Piggy\Api\Exceptions\MaintenanceModeException $e) {
    // Catch maintenance mode specific.
} catch(Piggy\Api\Exceptions\PiggyRequestException $e) {
    // If no Contact is found, you'd know that from this exception
} catch(\Exception $) {
    // Handle any other exceptions 
}
```

**Example with OAuth Client Using API Key**
```
$apiKey = 'xxxxxxxx';
$someBaseUrl = "https://yourcompany.com/";
$client = new OAuthClientApiKey($apiKey);
$client->setBaseUrl($someBaseUrl);

try {
    $contact = $client->contacts->findOneBy('test@domain.com'); // Example call to find a Contact by e-mail address
} catch(Piggy\Api\Exceptions\MaintenanceModeException $e) {
    // Catch maintenance mode specific.
} catch(Piggy\Api\Exceptions\PiggyRequestException $e) {
    // If no Contact is found, you'd know that from this exception
} catch(\Exception $) {
    // Handle any other exceptions 
}
```

**Example with Static Functions using API Key**
```
$apiKey = 'xxxxxxxx';
$someBaseUrl = "https://yourcompany.com/";

ApiClient::configure($apiKey, $someBaseUrl);

try {
    $contact = Contact::update("1234ab-7890-asdf-1234-a1b2c3d4", ["attributes" => ["firstname" => "henk", "housenumber" => 10]]); // Example call to update a Contact by uuid
} catch(Piggy\Api\Exceptions\MaintenanceModeException $e) {
    // Catch maintenance mode specific.
} catch(GuzzleHttp\Exception\GuzzleException $e) {
    // If no Contact is found, you'd know that from this exception
} catch(\Exception $) {
    // Handle any other exceptions 
}
```
