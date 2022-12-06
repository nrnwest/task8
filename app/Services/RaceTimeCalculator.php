<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\RaceTime;
use App\DTO\ResultTime;

class RaceTimeCalculator
{
    private const DOT = '.';
    private const NOUN = ':';

    /**
     * Calculates the time for each racer.
     */
    public function calculate(RaceTime $start, RaceTime $end): ResultTime
    {
        $startTime = new \DateTime();
        $startTime->setTime($start->getHour(), $start->getMinute(), $start->getSecond(), $start->getMicroSecond());
        $endTime = new \DateTime();
        $endTime->setTime($end->getHour(), $end->getMinute(), $end->getSecond(), $end->getMicroSecond());
        $dateInterval = $endTime->diff($startTime);

        return new ResultTime(
            $this->getTime($dateInterval, $this->getMilliseconds($dateInterval->f)),
            $this->getSeconds($dateInterval)
        );
    }

    private function getSeconds(\DateInterval $dateInterval): float
    {
        return (($dateInterval->h * 60 * 60) + ($dateInterval->i * 60) + ($dateInterval->s + $dateInterval->f));
    }

    private function getTime(\DateInterval $dateInterval, int $milliSeconds): string
    {
        return
            $dateInterval->h .
            self::NOUN .
            $dateInterval->i .
            self::NOUN .
            $dateInterval->s .
            self::DOT .
            $milliSeconds;
    }

    private function getMilliseconds(float $microSeconds): int
    {
        [, $milliSeconds] = explode(self::DOT, (string) ($microSeconds * 1000));

        return (int) $milliSeconds;
    }
}
