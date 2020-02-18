# Laravel Recurring

[![Latest Version](https://badgen.net/packagist/v/kodekeep/laravel-recurring)](https://packagist.org/packages/kodekeep/laravel-recurring)
[![Software License](https://badgen.net/packagist/license/kodekeep/laravel-recurring)](https://packagist.org/packages/kodekeep/laravel-recurring)
[![Build Status](https://img.shields.io/github/workflow/status/kodekeep/laravel-recurring/run-tests?label=tests)](https://github.com/kodekeep/laravel-recurring/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Coverage Status](https://badgen.net/codeclimate/coverage/kodekeep/laravel-recurring)](https://codeclimate.com/github/kodekeep/laravel-recurring)
[![Quality Score](https://badgen.net/codeclimate/maintainability/kodekeep/laravel-recurring)](https://codeclimate.com/github/kodekeep/laravel-recurring)
[![Total Downloads](https://badgen.net/packagist/dt/kodekeep/laravel-recurring)](https://packagist.org/packages/kodekeep/laravel-recurring)

This package was created by, and is maintained by [Brian Faust](https://github.com/faustbrian), and provides Recurrence Rules for Laravel.

## Installation

```bash
composer require kodekeep/laravel-recurring
```

## Usage

``` php
namespace App;

use KodeKeep\Recurring\Recurring;
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

If you discover a security vulnerability within this package, please send an e-mail to hello@kodekeep.com. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## Support Us

We invest a lot of resources into creating and maintaining our packages. You can support us and the development through [GitHub Sponsors](https://github.com/sponsors/faustbrian).

## License

Laravel Recurring is an open-sourced software licensed under the [MPL-2.0](LICENSE.md).
