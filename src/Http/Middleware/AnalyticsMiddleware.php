<?php

namespace Klimis\SsApiAnalytics\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Klimis\SsApiAnalytics\Facade\AnalyticsFacade;
use Klimis\SsApiAnalytics\Jobs\LogRequest;

class AnalyticsMiddleware
{
    const PARAM_LOG_ONLY_VALUE = 't';

    public function handle($request, \Closure $next, $guard = null)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if ($this->log($request)) {
            Log::debug('Logging ss-api- request');
            LogRequest::dispatchSync($this->getRequestData($request, $response));
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

    /**
     * Log only if: 1. Analytics is enabled 2. Log only if query_param_log parametere is not set or is set and is equal to self::PARAM_LOG_ONLY_VALUE
     */
    public function log($request): bool
    {
        if (AnalyticsFacade::getAnalyticsStatus()) {
            if (AnalyticsFacade::getParamLogOnly() === null || (
                    $request->has(AnalyticsFacade::getParamLogOnly()) && $request->get(AnalyticsFacade::getParamLogOnly()) === self::PARAM_LOG_ONLY_VALUE
                )) {
                return true;
            }
        }

        return false;
    }
}
