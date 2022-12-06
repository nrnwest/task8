<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Exceptions\IncorrectSortingValues;
use App\Services\ReportOrder;
use Closure;
use Illuminate\Http\Request;

class RaceParamIsValid
{
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $order = $request->get(ReportOrder::KEY_ORDER);
        if (!in_array($order, [ReportOrder::DEFAULT_ORDER, ReportOrder::ORDER_DESC, null])) {
            throw new IncorrectSortingValues($order);
        }

        return $next($request);
    }
}
