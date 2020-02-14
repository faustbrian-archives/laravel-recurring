<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Recurring.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\Recurring\Tests\Unit\Concerns;

use KodeKeep\Recurring\Tests\TestCase;

/**
 * @covers \KodeKeep\Recurring\Concerns\Recurring
 */
class RecurringTest extends TestCase
{
    /** @test */
    public function recurring_instantiates_builder()
    {
        $recurring = new RecurringExample();

        $builder = $recurring->recurr();

        $this->assertTrue($builder instanceof \KodeKeep\Recurring\Builder);
    }

    /** @test */
    public function recurring_model_instantiates_builder()
    {
        $recurring = new RecurringModelExample();

        $builder = $recurring->recurr();

        $this->assertTrue($builder instanceof \KodeKeep\Recurring\Builder);
    }
}

class RecurringExample
{
    use \KodeKeep\Recurring\Concerns\Recurring;

    private $start_at = '';

    private $end_at = '';

    private $timezone = '';

    private $frequency = '';

    private $interval = 0;

    private $count = null;
}

class RecurringModelExample extends \Illuminate\Database\Eloquent\Model
{
    use \KodeKeep\Recurring\Concerns\Recurring;

    private $start_at = '';

    private $end_at = '';

    private $timezone = '';

    private $frequency = '';

    private $interval = 0;

    private $count = null;
}
