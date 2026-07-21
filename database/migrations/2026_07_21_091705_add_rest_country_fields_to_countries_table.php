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
        Schema::table('countries', function (Blueprint $table) {

            $table->string('currency_name')->nullable()->after('currency_code');

            $table->string('language')->nullable()->after('region');

            $table->string('flag')->nullable()->after('longitude');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {

            $table->dropColumn([
                'currency_name',
                'language',
                'flag'
            ]);

        });
    }
};