<?php

declare(strict_types=1);

namespace App\Exceptions;

class FileNotExistException extends \Exception
{
    private const MESSAGES = 'There is not necessarily a data file : ';

    public function __construct(string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
