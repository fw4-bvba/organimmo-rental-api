# Organimmo rental API

PHP client for the [Organimmo](https://www.organimmo.be) rental API. For terms of use and API credentials, refer to 
[the official documentation](https://api-docs.verhuur.expert/).

## Installation

`composer require fw4/organimmo-rental-api`

## Usage

```php
use Organimmo\Rental\Organimmo;

$client = new Organimmo('customer-id');

// Retrieve existing access token from storage (getAccessTokenFromDataStore to be implemented)
$accessToken = getAccessTokenFromDataStore();

if (empty($accessToken) || $accessToken->hasExpired()) {
	// Request and store new access token (saveAccessTokenToDataStore to be implemented)
	$accessToken = $client->requestAccessToken('client-id', 'client-secret', 'username', 'password');
    saveAccessTokenToDataStore($accessToken);
} else {
    $client->setAccessToken($accessToken);
}
```

All endpoints are available as methods of the Organimmo class. For more information about available endpoints and
response format, refer to [the official API documentation](https://api-docs.verhuur.expert/).

### Retrieving objects by ID

Call `get($id)` on an endpoint to retrieve a specific object by ID. If no object exists with the provided ID, null is
returned.

```php
$country = $client->countries()->get(1);

if (is_null($country)) echo 'Country does not exist' . PHP_EOL;
else echo $country->name . PHP_EOL;
```

### Listing objects

Call `get()` on an endpoint to retrieve a traversable list of objects. Any pagination that's required happens
automatically.

```php
$countries = $client->countries()->get();

foreach ($countries as $country) {
	echo $country->name . PHP_EOL;
}
```

Some endpoints may themselves provide additional methods for retrieving related objects. These methods usually accept
the ID of the relevant parent object. Like with other endpoints, chain `get()` on these methods to retrieve a
traversable list of objects.

```php
$rental_unit_id = 1;
$photos = $client->rentalUnits()->photos($rental_unit_id)->get();
```

### Related objects in responses

Responses may contain references to related objects. The actual data of these objects is not present in the response by
default, but can easily be retrieved by calling `get()` on the pointer object.

```php
$city = $client->cities()->get(1);
$country = $city->country->get();
echo $country->name . PHP_EOL;
```

Alternatively, it is possible to use the `depth` method to pre-fetch related objects. Pass an integer from 1 to 5 to
determine how many levels to pre-fetch.

```php
$city = $client->cities()->depth(1)->get(1);
echo $city->country->name . PHP_EOL;
```

### Sorting results

Use the `sort('fieldname')` method to order results by a specific property.

```php
$countries = $client->countries()->sort('name')->get();
```

### Filtering results by date

Use the `from($date)` and `to($date)` methods to filter results by modification or creation date. These methods accept
DateTime objects.

```php
$countries = $client->countries()->from(date_create('2020-01-01'))->to(date_create('2020-06-01'))->get();
```

## License

`fw4/organimmo-rental-api` is licensed under the MIT License (MIT). Please see [LICENSE](LICENSE) for more information.