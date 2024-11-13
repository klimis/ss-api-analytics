<?php

namespace Klimis\SsApiAnalytics\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Klimis\SsApiAnalytics\Facade\AnalyticsFacade;
use Klimis\SsApiAnalytics\Jobs\LogRequest;

class AnalyticsMiddleware
{
    public function handle($request, \Closure $next, $guard = null)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $requestData = $this->getRequestData($request, $response);
        //Log::debug('middleware $requestData: ' . json_encode($requestData));
        LogRequest::dispatchSync($requestData);
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
            'duration_ms' => 0
        ];
    }
}
