<?php

declare(strict_types=1);

namespace App\Exceptions;

class WrongDirectoryException extends \Exception
{
    private const MESSAGES = 'wrong directory: ';

    public function __construct(string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
