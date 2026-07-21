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
        Schema::table('economic_data', function (Blueprint $table) {

            $table->bigInteger('population')
                ->nullable()
                ->after('economic_growth');

            $table->decimal('exports', 15, 2)
                ->nullable()
                ->after('population');

            $table->decimal('imports', 15, 2)
                ->nullable()
                ->after('exports');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('economic_data', function (Blueprint $table) {

            $table->dropColumn([
                'population',
                'exports',
                'imports'
            ]);

        });
    }
};