<?php

declare(strict_types=1);

namespace App\Exceptions;

class ApiErrorFormatException extends \Exception
{
    private const MESSAGES = 'Invalid format: ';

    public function __construct(?string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
