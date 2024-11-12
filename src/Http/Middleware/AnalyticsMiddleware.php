<?php

namespace Klimis\SsApiAnalytics\Http\Middleware;

use Illuminate\Support\Facades\Log;

class AnalyticsMiddleware
{
    public function handle($request, \Closure $next, $guard = null)
    {

        Log::debug('Called controller: ' .  $request->route()->getActionMethod());

        return $next($request);
    }
}
