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

namespace KodeKeep\Recurring\Concerns;

use KodeKeep\Recurring\Builder;

trait Recurring
{
    public function recurr(): Builder
    {
        return new Builder($this);
    }

    public function getRecurringConfig()
    {
        return [
            'start_date' => $this->start_at,
            'end_date'   => $this->end_at,
            'timezone'   => $this->timezone,
            'frequency'  => $this->frequency,
            'interval'   => $this->interval,
            'count'      => $this->count,
        ];
    }
}
