<?php

namespace Klimis\SsApiAnalytics;

use Illuminate\Support\Facades\Http;

class ApiAnalytics
{
    public function justDoIt()
    {
        $response = Http::get('https://demo.api.coin-dev.eu/api/v1/en/cms/stories');
        //get first title
        $array["aaa"] = $response->json()['data'][0]['title'];
        return 1;
    }
}
