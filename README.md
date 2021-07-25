# Laravel Recurring

[![Latest Version](https://badgen.net/packagist/v/konceiver/laravel-recurring)](https://packagist.org/packages/konceiver/laravel-recurring)
[![Software License](https://badgen.net/packagist/license/konceiver/laravel-recurring)](https://packagist.org/packages/konceiver/laravel-recurring)
[![Build Status](https://img.shields.io/github/workflow/status/konceiver/laravel-recurring/run-tests?label=tests)](https://github.com/konceiver/laravel-recurring/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Coverage Status](https://badgen.net/codeclimate/coverage/konceiver/laravel-recurring)](https://codeclimate.com/github/konceiver/laravel-recurring)
[![Quality Score](https://badgen.net/codeclimate/maintainability/konceiver/laravel-recurring)](https://codeclimate.com/github/konceiver/laravel-recurring)
[![Total Downloads](https://badgen.net/packagist/dt/konceiver/laravel-recurring)](https://packagist.org/packages/konceiver/laravel-recurring)

This package was created by, and is maintained by [Brian Faust](https://github.com/faustbrian), and provides Recurrence Rules for Laravel.

## Installation

```bash
composer require konceiver/laravel-recurring
```

## Usage

``` php
namespace App;

use Konceiver\Recurring\Recurring;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Recurring;
}
```

```php
Route::get('/', function () {
    $task = App\Task::first();

    $task->recurr()->first();

    $task->recurr()->last();

    $task->recurr()->next();

    $task->recurr()->current();

    $task->recurr()->rule();

    $task->recurr()->schedule();
});
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@konceiver.dev. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## Support Us

We invest a lot of resources into creating and maintaining our packages. You can support us and the development through [GitHub Sponsors](https://github.com/sponsors/faustbrian).

## License

Laravel Recurring is an open-sourced software licensed under the [MPL-2.0](LICENSE.md).
