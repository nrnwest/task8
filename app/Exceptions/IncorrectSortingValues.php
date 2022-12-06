<?php

declare(strict_types=1);

namespace App\Exceptions;

class IncorrectSortingValues extends \Exception
{
    private const MESSAGES = 'Incorrect sorting values: ';

    public function __construct(string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
