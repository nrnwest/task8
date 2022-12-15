<?php

declare(strict_types=1);

namespace App\DTO;

class ResultTime
{
    public function __construct(private string $time)
    {
    }

    public function getTime(): string
    {
        return $this->time;
    }
}
