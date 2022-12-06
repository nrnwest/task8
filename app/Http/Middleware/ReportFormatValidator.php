<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\DTO\ApiDictionary;
use App\Exceptions\ApiErrorFormatException;
use Closure;
use Illuminate\Http\Request;

class ReportFormatValidator
{
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $format = $request->get(config('race.api.format'));
        if (!in_array($format, config('race.api.formatType'))) {
            throw new ApiErrorFormatException($format);
        }

        return $next($request);
    }
}
