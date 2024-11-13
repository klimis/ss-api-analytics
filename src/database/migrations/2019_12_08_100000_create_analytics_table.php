<?php

// phpcs:ignoreFile

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Klimis\SsApiAnalytics\Facade\AnalyticsFacade;
use OhSeeSoftware\LaravelServerAnalytics\Facades\ServerAnalytics;

class CreateAnalyticsTable extends Migration
{
    public function up()
    {
        Schema::create(AnalyticsFacade::getAnalyticsTable(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->string('method');
            $table->integer('status_code');
            $table->integer('duration_ms');
            $table->string('user_agent');
            $table->string('ip_address');
            $table->string('host')->nullable();
            $table->string('referrer')->nullable();
            $table->json('query_params')->nullable();
            $table->timestamps();
        });


    }

    public function down()
    {
        Schema::dropIfExists(AnalyticsFacade::getAnalyticsTable());
    }
}
