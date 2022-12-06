<?php

declare(strict_types=1);

namespace App\Services;

class FileSystem
{
    private const SEPARATOR = '\\/';

    public function read(string $pathFile): string
    {
        $pathFile = ltrim($pathFile, self::SEPARATOR);

        return file_get_contents(dirname(__FILE__, 3) . DIRECTORY_SEPARATOR . $pathFile);
    }
}
