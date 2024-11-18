<?php

namespace Klimis\SsApiAnalytics\Facade;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void getMethod(Request $request)
 * @method static void getPath(Request $request)
 * @method static void getHost(Request $request)
 * @method static void getStatusCode(Response $request)
 * @method static void getUserAgent(Request $request)
 * @method static void getIpAddress(Request $request)
 * @method static void getReferrer(Request $request)
 * @method static void getQueryParams(Request $request)
 * @method static void getAnalyticsTable()
 * @method static void getParamLogOnly()
 * @method static void getAnalyticsStatus()
 */
class AnalyticsFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'analytics';
    }
}
