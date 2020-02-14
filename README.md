# Laravel Recurring

[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kodekeep/laravel-recurring/run-tests?label=tests)](https://github.com/kodekeep/laravel-recurring/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Code Coverage](https://badgen.now.sh/codecov/c/github/kodekeep/laravel-recurring)](https://codecov.io/gh/kodekeep/laravel-recurring)
[![Minimum PHP Version](https://badgen.net/packagist/php/kodekeep/laravel-recurring)](https://packagist.org/packages/kodekeep/laravel-recurring)
[![Latest Version](https://badgen.net/packagist/v/kodekeep/laravel-recurring)](https://packagist.org/packages/kodekeep/laravel-recurring)
[![Total Downloads](https://badgen.net/packagist/dt/kodekeep/laravel-recurring)](https://packagist.org/packages/kodekeep/laravel-recurring)
[![License](https://badgen.net/packagist/license/kodekeep/laravel-recurring)](https://packagist.org/packages/kodekeep/laravel-recurring)

> Recurrence Rules for Laravel.

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

## License

Mozilla Public License Version 2.0 (MPL-2.0). Please see [License File](LICENSE.md) for more information.
