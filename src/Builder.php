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

namespace KodeKeep\Recurring;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Str;
use Recurr\RecurrenceCollection;
use Recurr\Rule;
use Recurr\Transformer\ArrayTransformer;
use Recurr\Transformer\ArrayTransformerConfig;

class Builder
{
    private $recurring;

    private Config $config;

    public function __construct($recurring)
    {
        $this->recurring = $recurring;
        $this->config    = $this->buildConfig();
    }

    public function first()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        return Carbon::instance($schedule->first()->getStart());
    }

    public function last()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        return Carbon::instance($schedule->last()->getStart());
    }

    public function next()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        if (! $next = $schedule->next()) {
            return false;
        }

        return Carbon::instance($next->getStart());
    }

    public function current()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        return Carbon::instance($schedule->current()->getStart());
    }

    /**
     * @return \Recurr\RecurrenceCollection
     */
    public function schedule(): RecurrenceCollection
    {
        $transformerConfig = new ArrayTransformerConfig();
        $transformerConfig->enableLastDayOfMonthFix();

        $transformer = new ArrayTransformer();
        $transformer->setConfig($transformerConfig);

        return $transformer->transform($this->rule());
    }

    /**
     * @return \Recurr\Rule
     */
    public function rule(): Rule
    {
        $config = $this->getConfig();

        $rule = (new Rule())
            ->setStartDate(new DateTime($config['start_date'], new DateTimeZone($config['timezone'])))
            ->setTimezone($config['timezone'])
            ->setFreq($this->getFrequencyType())
            ->setInterval($config['interval']);

        if (! empty($config['count'])) {
            $rule = $rule->setCount($config['count']);
        }

        if (! empty($config['end_date'])) {
            $rule = $rule->setEndDate(new DateTime($config['end_date'], new DateTimeZone($config['timezone'])));
        }

        return $rule;
    }

    /**
     * @return string
     */
    public function getFrequencyType(): string
    {
        $frequency = $this->getFromConfig('frequency');

        if (! in_array($frequency, $this->config->getFrequencies(), true)) {
            throw new \InvalidArgumentException("$frequency is not a valid frequency");
        }

        return $frequency;
    }

    private function getFromConfig($key)
    {
        return $this->config->{'get'.Str::studly($key)}();
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config->toArray();
    }

    private function buildConfig(): Config
    {
        $config = $this->recurring->getRecurringConfig();

        return new Config(
            $config['start_date'], $config['end_date'], $config['timezone'],
            $config['frequency'], $config['interval'], $config['count']
        );
    }
}
