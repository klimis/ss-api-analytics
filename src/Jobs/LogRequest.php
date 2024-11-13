<?php

namespace Klimis\SsApiAnalytics\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Klimis\SsApiAnalytics\Models\Analytics;


class LogRequest implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    public function __construct(public array $data)
    {

    }

    public function handle()
    {
        Analytics::create($this->data);
        Log::debug('job $requestData: ' . json_encode($this->data));
    }
}
