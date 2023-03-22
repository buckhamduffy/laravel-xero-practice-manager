# This is my package laravel-xero-practice-manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/buckhamduffy/laravel-xero-practice-manager.svg?style=flat-square)](https://packagist.org/packages/buckhamduffy/laravel-xero-practice-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/buckhamduffy/laravel-xero-practice-manager/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/buckhamduffy/laravelxeropracticemanager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/buckhamduffy/laravelxeropracticemanager/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/buckhamduffy/laravelxeropracticemanager/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/buckhamduffy/laravelxeropracticemanager.svg?style=flat-square)](https://packagist.org/packages/buckhamduffy/laravel-xero-practice-manager)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require buckhamduffy/laravel-xero-practice-manager
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-xero-practice-manager-config"
```

This is the contents of the published config file:

```php
return [
    'cache' => false,
];
```

## Usage

```php
    $result = $client = LaravelXeroPracticeManager::make($token, $tenant_id)
                ->clients()
                ->list()
                ->send();
    if(!$result->successful()) {
        $result->throwError();
    }

    foreach($result->getDto() as $client) {
        dump($client);
    }
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Aaron Florey](https://github.com/buckhamduffy)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
