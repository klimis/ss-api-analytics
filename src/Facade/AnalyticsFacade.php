<?php

namespace Klimis\SsApiAnalytics\Facade;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void getMethod(Request $request)
 */
class AnalyticsFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'analytics';
    }


}
