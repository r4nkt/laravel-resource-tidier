# todo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/r4nkt/laravel-resource-tidier.svg?style=flat-square)](https://packagist.org/packages/r4nkt/laravel-resource-tidier)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/r4nkt/laravel-resource-tidier/run-tests?label=tests)](https://github.com/r4nkt/laravel-resource-tidier/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/r4nkt/laravel-resource-tidier/Check%20&%20fix%20styling?label=code%20style)](https://github.com/r4nkt/laravel-resource-tidier/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/r4nkt/laravel-resource-tidier.svg?style=flat-square)](https://packagist.org/packages/r4nkt/laravel-resource-tidier)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-laravel-resource-tidier-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-laravel-resource-tidier-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require r4nkt/laravel-resource-tidier
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="R4nkt\ResourceTidier\ResourceTidierServiceProvider" --tag="laravel-resource-tidier-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="R4nkt\ResourceTidier\ResourceTidierServiceProvider" --tag="laravel-resource-tidier-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$resourceTidier = new R4nkt\ResourceTidier();
echo $resourceTidier->echoPhrase('Hello, Spatie!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Travis Elkins](https://github.com/telkins)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
