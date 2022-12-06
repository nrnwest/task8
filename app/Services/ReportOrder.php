<?php

declare(strict_types=1);

namespace App\Services;

class ReportOrder
{
    public const KEY_ORDER = 'order';
    public const DEFAULT_ORDER = 'asc';
    public const ORDER_DESC = 'desc';

    public function getOrder(?string $order): string
    {
        if ($order === null || $order === self::DEFAULT_ORDER) {
            return self::DEFAULT_ORDER;
        }

        return self::ORDER_DESC;
    }

    public function getOrderTemplate(?string $order): string
    {
        if ($order === null || $order === self::DEFAULT_ORDER) {
            return self::ORDER_DESC;
        }

        return self::DEFAULT_ORDER;
    }
}
