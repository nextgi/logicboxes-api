# Description
This library is designed to work with providers that operate on the LogicBoxes architecture. Some include:
 * ResellerClub ([Docs](https://resellerclub.webpropanel.com/kb/answer/751))
 * LogicBoxes
 
Available API requests: 
* Actions
* Billing
* Contacts
* Customers
* Dns
* Domains
* Orders
* Products


## Installation
```console
composer require nextgi/logicboxes-api
```

## Usage Example
```php
use nextgi\LogicBoxes\ResellerApi;

// In our example, we are using ResellerClub
$registrar = new ResellerApi('<provider>', '<userId>', '<apiKey>');
$registrar->domains()->available(['google', 'example'], ['com', 'net']);
```

### Original Contributor
Many thanks to [Ahmet Bora](https://github.com/afbora "Ahmet Bora"). This repository based on his [ResellerClub PHP SDK](https://github.com/afbora/resellerclub-php-sdk "ResellerClub PHP SDK") repository.
