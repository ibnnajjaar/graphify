# Graphify

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibnnajjaar/graphify.svg?style=flat-square)](https://packagist.org/packages/ibnnajjaar/graphify)
[![Total Downloads](https://img.shields.io/packagist/dt/ibnnajjaar/graphify.svg?style=flat-square)](https://packagist.org/packages/ibnnajjaar/graphify)

Generating open graph images will be made easy with the use of this package.

## Installation

You can install the package via composer:

```bash
composer require ibnnajjaar/graphify
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="graphify-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="graphify-views"
```

## Usage

```php
$graphify = new Ibnnajjaar\Graphify();
echo $graphify->echoPhrase('Hello, Ibnnajjaar!');
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

- [ibnnajjaar](https://github.com/ibnnajjaar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
