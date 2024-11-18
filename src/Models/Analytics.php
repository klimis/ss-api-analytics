<?php

namespace Klimis\SsApiAnalytics\Models;

use Illuminate\Database\Eloquent\Model;
use Klimis\SsApiAnalytics\Facade\AnalyticsFacade;

class Analytics extends Model
{
    public function getTable()
    {
        return AnalyticsFacade::getAnalyticsTable();
    }

    protected $fillable = [
        'user_id', 'path', 'method', 'status_code', 'duration_ms',
        'user_agent', 'query_params', 'ip_address', 'referrer', 'host',
    ];

    protected $casts = [
        'query_params' => 'array',
    ];
}
