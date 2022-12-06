<?php

declare(strict_types=1);

namespace App\DTO;

class RaceTime
{


    public function __construct(
        private string $data,
        private string $hour,
        private string $minute,
        private string $second,
        private string $microSecond
    ) {
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getHour(): int
    {
        return (int) $this->hour;
    }

    public function getMinute(): int
    {
        return (int) $this->minute;
    }

    public function getSecond(): int
    {
        return (int) $this->second;
    }

    public function getMicroSecond(): int
    {
        return (int) $this->microSecond;
    }
}
