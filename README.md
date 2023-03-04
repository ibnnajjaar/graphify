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
    'view_path' => 'graphify::graphify',
];
```

## Usage

First you need to follow the instructions in spatie media library to add images for the model you are about to generate open graph images. This will usually be named Post or Article model.
You can find their extensive documentation [here](https://spatie.be/docs/laravel-medialibrary/v10/installation-setup)

### Preparing Your Model
implement `HasGraphify` interface on your model and add the `GraphifyTrait` to the model as shown below.

```php

use Spatie\MediaLibrary\InteractsWithMedia;
use Ibnnajjaar\Graphify\Support\HasGraphify;
use Ibnnajjaar\Graphify\Support\GraphifyTrait;

class Post extends Model implements HasMedia, HasGraphify
{

    use InteractsWithMedia;
    use GraphifyTrait;
    
    // ...rest of the code
}

```

## Customizing the view

Coming soon...

## Regenerating OG Image On Selective Field Update
Coming soon...

## Manually Triggering OG Image Generation
Coming soon...

## Credits

- [ibnnajjaar](https://github.com/ibnnajjaar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
