<?php

namespace Klimis\SsApiAnalytics;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ServerSideAnalytics
{


    public function setRequest(Request $request): self
    {
        $this->request = $request;

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

}
