# laravel-controller-routes

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require sdavis1902/laravel-controller-routes
```

Once installed add the service provider and alias

``` php
'providers' => [
    ...
    sdavis1902\LaravelControllerRoutes\LaravelControllerRoutesServiceProvider::class,
],
```

``` php
'aliases' => [
    ...
	'MoreRoute' => sdavis1902\LaravelControllerRoutes\Facades\MoreRoute::class,
],
```

## Usage

In your routes file

``` php
MoreRoute::controller('/test', 'TestController');
```

Your Controller

``` php
class TestController extends Controller {
    public function getFrank(){
        return 'woo';
    }
}
```
You can now go to yourdomain.comm/test/frank and it should say "woo"

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email s.davis1902@gmail.com instead of using the issue tracker.

## Credits

- [Scott Davis][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sdavis1902/laravel-controller-routes.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/sdavis1902/laravel-controller-routes/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/sdavis1902/laravel-controller-routes.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/sdavis1902/laravel-controller-routes.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sdavis1902/laravel-controller-routes.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sdavis1902/laravel-controller-routes
[link-travis]: https://travis-ci.org/sdavis1902/laravel-controller-routes
[link-scrutinizer]: https://scrutinizer-ci.com/g/sdavis1902/laravel-controller-routes/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/sdavis1902/laravel-controller-routes
[link-downloads]: https://packagist.org/packages/sdavis1902/laravel-controller-routes
[link-author]: https://github.com/sdavis1902
[link-contributors]: ../../contributors
