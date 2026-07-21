<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('risk_events', function (Blueprint $table) {

            $table->integer('weather_score')
                ->default(0)
                ->after('severity');

            $table->integer('inflation_score')
                ->default(0)
                ->after('weather_score');

            $table->integer('currency_score')
                ->default(0)
                ->after('inflation_score');

            $table->integer('news_score')
                ->default(0)
                ->after('currency_score');

            $table->integer('risk_score')
                ->default(0)
                ->after('news_score');

            $table->string('api_source')
                ->nullable()
                ->after('source');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('risk_events', function (Blueprint $table) {

            $table->dropColumn([
                'weather_score',
                'inflation_score',
                'currency_score',
                'news_score',
                'risk_score',
                'api_source'
            ]);

        });
    }
};