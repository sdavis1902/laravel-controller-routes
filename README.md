# laravel-controller-routes

[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

As of Laravel 5.3, Route::controller was removed.  This provides the same functionality.

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

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

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
