<?php

declare(strict_types=1);

namespace App\Exceptions;

class DriverNotFoundException extends \Exception
{
    private const MESSAGES = 'Wrong first and last name driver: ';

    public function __construct(string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
