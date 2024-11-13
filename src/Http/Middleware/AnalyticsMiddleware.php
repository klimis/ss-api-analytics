<?php

namespace Klimis\SsApiAnalytics\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Klimis\SsApiAnalytics\Facade\AnalyticsFacade;


class AnalyticsMiddleware
{
    public function handle($request, \Closure $next, $guard = null)
    {

        $request->analyticsRequestStartTimer = round(microtime(true) * 1000);

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $requestData = $this->getRequestData($request, $response);
        // dd($requestData);
        Log::debug('middleware $requestData: ' . json_encode($requestData));
        Log::debug('Called terminate');
    }

    public function getRequestData($request, $response): array
    {
        /** @var RequestDetails $requestDetails */

        //$analytics = app('analytics');
//        $analytics->getRequest($request);
//        $analytics->setResponse($response);


        return [
            'method' => AnalyticsFacade::getMethod($request),
        ];
    }
}
