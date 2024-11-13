<?php

namespace Klimis\SsApiAnalytics\Providers;

use Carbon\Laravel\ServiceProvider;
use Klimis\SsApiAnalytics\Facade\AnalyticsFacade;
use Klimis\SsApiAnalytics\Http\Middleware\AnalyticsMiddleware;
use Klimis\SsApiAnalytics\ServerSideAnalytics;

class AnalyticsProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('ss-api-analytics.php'),
            ], 'config');
        }
    }

    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'ss-api-analytics');

        // Register the main class to use with the facade
        $this->app->singleton('analytics', function () {
            return new ServerSideAnalytics;
        });

        $this->app->singleton(AnalyticsMiddleware::class);
    }
}
