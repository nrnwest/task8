<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;

class Driver implements Arrayable
{
    public function __construct(
        private string $time,
        private float $microTime,
        private string $driverId,
        private string $name,
        private string $auto,
        private int $position=0,
    ) {
    }

    public function toArray(): array
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[$key] = $value;
        }
        return $result;
    }

    public function getDriverId(): string
    {
        return $this->driverId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuto(): string
    {
        return $this->auto;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getMicroTime(): float
    {
        return $this->microTime;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}
