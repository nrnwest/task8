<?php

declare(strict_types=1);

namespace App\Exceptions;

class ParameterNotSetException extends \Exception
{
    private const MESSAGES = 'You did not specify a mandatory argument: ';

    public function __construct(string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
