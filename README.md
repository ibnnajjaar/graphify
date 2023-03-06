# Graphify

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibnnajjaar/graphify.svg?style=flat-square)](https://packagist.org/packages/ibnnajjaar/graphify)
[![Total Downloads](https://img.shields.io/packagist/dt/ibnnajjaar/graphify.svg?style=flat-square)](https://packagist.org/packages/ibnnajjaar/graphify)

Generating open graph images will be made easy with the use of this package.

## Documentation
See the [documentation](https://ibnnajjaar.gitbook.io/graphify/) for detailed installation and usage instructions.

## What It Does

### Generating Open Graph Images
If the model preparation is done correctly, an OG Image will be created when a new record is created.

#### Manually Triggering OG Image Generation
To manually trigger OG Image generation, you can call generateGraphify() method on your model instance as below.
```php
$yourModel->generateGraphify();
```

### Retrieving OG Images
To retreive  a generated OG image, you can use the below methods.
```php
$yourModel->graphify_image;
$yourModel->og_image_url;

// Or if you have a custom image field
$yourModel->your_custom_og_image_url;
```

## Credits

- [ibnnajjaar](https://github.com/ibnnajjaar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
