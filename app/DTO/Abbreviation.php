<?php

declare(strict_types=1);

namespace App\DTO;

class Abbreviation
{
    public function __construct(private string $driverId, private string $name, private string $auto)
    {
    }

    public function getAuto(): string
    {
        return $this->auto;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDriverId(): string
    {
        return $this->driverId;
    }
}
