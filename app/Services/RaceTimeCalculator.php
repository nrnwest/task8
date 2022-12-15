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
            $this->getTime($dateInterval, $this->getMilliseconds($dateInterval->f))
        );
    }

    private function getTime(\DateInterval $dateInterval, int $milliSeconds): string
    {
        return
            $this->addZeroAhead($dateInterval->h) .
            self::NOUN .
            $this->addZeroAhead($dateInterval->i) .
            self::NOUN .
            $this->addZeroAhead($dateInterval->s) .
            self::DOT .
            $this->addZeroAhead($milliSeconds);
    }

    private function addZeroAhead(int $number): string
    {
        return  $number < 10 ? '0' . $number : (string) $number;
    }

    private function getMilliseconds(float $microSeconds): int
    {
        [, $milliSeconds] = explode(self::DOT, (string)($microSeconds * 1000));

        return (int)$milliSeconds;
    }
}
