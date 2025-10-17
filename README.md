# A set of basic packages to start with filament projects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/softok2/filament-starter-kit.svg?style=flat-square)](https://packagist.org/packages/softok2/filament-starter-kit)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/softok2/filament-starter-kit/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/softok2/filament-starter-kit/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/softok2/filament-starter-kit/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/softok2/filament-starter-kit/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/softok2/filament-starter-kit.svg?style=flat-square)](https://packagist.org/packages/softok2/filament-starter-kit)


Wrap a set of basic packages to start with filament projects. 

## Support us

[<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_632_webp/af150716842105.562b217f14d54.jpg" width="419px" />](https://softok2.com/)


## Installation

You can install the package via composer:

```bash
composer require softok2/filament-starter-kit
```

Start by executing the instalation command:
```bash
php artisan filament-starter-kit:install
```


Configuration steps:

1. Add the theme’s CSS file to the Laravel plugin’s `input` array in `vite.config.js`:

```php
input: [
    // ...
    'resources/css/filament/admin/theme.css',
]
```

2. Now, register the Vite-compiled theme CSS file in the panel’s provider:

```php
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->viteTheme('resources/css/filament/admin/theme.css');
}
```

3. Add installed plugins to AdminPanelServiceProvider:

```php
 ->plugins([
            FilamentApexChartsPlugin::make(),
             AuthUIEnhancerPlugin::make(),
              EasyFooterPlugin::make(),
        ]);
```

4. Add the following to your `theme.css` file

```php
 @source '../../../../vendor/diogogpinto/filament-auth-ui-enhancer/resources/**/*.blade.php';
 @source '../../../../vendor/devonab/filament-easy-footer/resources/views!**!*'
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

- [franky](https://github.com/softok2)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
