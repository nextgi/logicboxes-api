# Description
This library is designed to work with providers that operate on the LogicBoxes architecture. Some include:
 * ResellerClub ([Docs](https://resellerclub.webpropanel.com/kb/answer/751))
 * LogicBoxes 
 ([Docs](https://manage.logicboxes.com/kb))
 
Available API requests: 
* Actions
* Billing
* Contacts
* Customers
* Dns
* Domains
* Orders
* Products
   * Customer Pricing
   * Reseller Pricing
   * Active Reseller Promotions


## Installation
```console
composer require nextgi/logicboxes-api
```

## Usage Example
```php
use nextgi\LogicBoxes\ResellerApi;

// In our example, we are using ResellerClub. Provider make no difference if they use LogicBoxes. 
$registrar = new ResellerApi('<userId>', '<apiKey>');
$registrar->domains()->available(['google', 'example'], ['com', 'net']);
```

### Original Contributor
Many thanks to [Ahmet Bora](https://github.com/afbora "Ahmet Bora"). This repository based on his [ResellerClub PHP SDK](https://github.com/afbora/resellerclub-php-sdk "ResellerClub PHP SDK") repository.
