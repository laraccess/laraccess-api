# Laraccess API Client


[![Latest Version on Packagist](https://img.shields.io/packagist/v/m1guelpf/laraccess-api.svg?style=flat-square)](https://packagist.org/packages/m1guelpf/laraccess-api)
[![Software License](https://img.shields.io/github/license/m1guelpf/laraccess-api.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/m1guelpf/laraccess-api/master.svg?style=flat-square)](https://travis-ci.org/m1guelpf/laraccess-api)
[![Total Downloads](https://img.shields.io/packagist/dt/m1guelpf/laraccess-api.svg?style=flat-square)](https://packagist.org/packages/m1guelpf/laraccess-api)

This package makes it easy to interact with [Laraccess](https://github.com/m1guelpf/laraccess).

## Installation

You can install the package via composer:

``` bash
composer require m1guelpf/laraccess-api
```

## Usage

You must pass a the API token to the constructor of `M1guelpf\LaraccessApi\Laraccess`.

``` php
$laraccess = new \M1guelpf\LaraccessApi\Laraccess('YOUR_LARACCESS_API_TOKEN');
```

or you can skip the token and use the `connect()` method later

``` php
$laraccess = new \M1guelpf\LaraccessApi\Laraccess();

$laraccess->connect('YOUR_LARACCESS_API_TOKEN');
```

### Get User info
``` php
$laraccess->getUser();
```

### Create User
``` php
$laraccess->createUser($user);
```

### Edit User
``` php
$laraccess->editUser($user);
```

### Delete User
``` php
$laraccess->deleteUser();
```

### Get User Campaigns
``` php
$laraccess->getUserCampaigns();
```

### Get Campaign
``` php
$laraccess->getCampaign($id);
```

### Create Campaign
``` php
$laraccess->createCampaign($campaign);
```

### Edit Campaign
``` php
$laraccess->editCampaign($id, $campaign);
```

### Delete Campaign
``` php
$laraccess->deleteCampaign($id);
```

### Get Campaign Leads
``` php
$laraccess->getCampaignLeads($id);
```

### Get Lead
``` php
$laraccess->getLead($id);
```

### Create Lead
``` php
$laraccess->createLead($id, $lead);
```

### Edit Lead
``` php
$laraccess->editLead($id, $lead);
```

### Delete Lead
``` php
$laraccess->deleteLead($id, $lead);
```

### Invite Lead
``` php
$laraccess->inviteLead($id);
```

### Renenerate Token

``` php
$laraccess->regenerateToken($set);
```
where `$set` is false if you don't want to use the new token on future requests.

### Get the Guzzle Client

``` php
$laraccess->getClient();
```

### Set the Guzzle Client

``` php
$client = new \GuzzleHttp\Client(); // Example Guzzle client
$laraccess->setClient($client);
```
where $client is an instance of `\GuzzleHttp\Client`.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email soy@miguelpiedrafita.com instead of using the issue tracker.

## Credits

- [Miguel Piedrafita](https://github.com/m1guelpf)
- [All Contributors](../../contributors)

## License

The Mozilla Public License 2.0 (MPL-2.0). Please see [License File](LICENSE.md) for more information.
