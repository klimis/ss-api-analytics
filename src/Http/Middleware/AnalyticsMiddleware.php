<?php

namespace Klimis\SsApiAnalytics\Http\Middleware;

use Klimis\SsApiAnalytics\Facade\AnalyticsFacade;

class AnalyticsMiddleware
{
    public function handle($request, \Closure $next, $guard = null)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if ($this->log($request)) {
            $this->getRequestData($request, $response);
        }
    }

    public function getRequestData($request, $response): array
    {
        return [
            'method' => AnalyticsFacade::getMethod($request),
            'host' => AnalyticsFacade::getHost($request),
            'path' => AnalyticsFacade::getPath($request),
            'status_code' => AnalyticsFacade::getStatusCode($response),
            'user_agent' => AnalyticsFacade::getUserAgent($request),
            'ip_address' => AnalyticsFacade::getIpAddress($request),
            'referrer' => AnalyticsFacade::getReferrer($request),
            'query_params' => AnalyticsFacade::getQueryParams($request),
            'duration_ms' => 0,
        ];
    }

    public function log($request): bool
    {
        return AnalyticsFacade::getAnalyticsStatus() && $request->get(AnalyticsFacade::getParamLogOnly()) === 't';
    }
}
