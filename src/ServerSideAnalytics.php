<?php

namespace Klimis\SsApiAnalytics;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ServerSideAnalytics
{


    public function setRequest(Request $request): self
    {
        $request = $request;

        return $this;
    }

    public function setResponse(Response $response): self
    {
        $this->response = $response;

        return $this;
    }

    public static function getMethod(Request $request): string
    {
        return strtoupper($request->getMethod());
    }

    public static function getPath(Request $request): string
    {
        return $request->getPathInfo();
    }


    /**
     * Returns the status code of the response.
     *
     * @return int
     */
    public function getStatusCode($response): int
    {
        return $response->getStatusCode();
    }

    public function getHost(Request $request): string
    {
        return $request->getHost();
    }

    /**
     * Returns the user agent of the request.
     *
     * @return string
     */
    public function getUserAgent(Request $request): string
    {
        return $request->header('User-Agent', 'unknown');
    }

    /**
     * Returns the IP Address of the request.
     *
     * @return string
     */
    public function getIpAddress(Request $request): string
    {
        return $request->ip();
    }

    /**
     * Returns the referrer of the request.
     *
     * @return string
     */
    public function getReferrer(Request $request): ?string
    {
        return $request->header('referer', null);
    }

    /**
     * Returns the query parameters for the request.
     *
     * @return array|null
     */
    public function getQueryParams(Request $request): ?array
    {
        return $request->query();
    }

    public function shouldTrackRequest(Request $request): bool
    {
        return true;
    }

    public function getAnalyticsTable(): string
    {
        return config('ss-api-analytics.analytics_db_table');
    }

    /** If this param is set log only if it is equal to 't''
     * @return string
     */
    public function getParamLogOnly(): ?string
    {
        return config('ss-api-analytics.query_param_log');
    }

    public function getAnalyticsStatus(): bool
    {
        return config('ss-api-analytics.enable_analytics');
    }

}
