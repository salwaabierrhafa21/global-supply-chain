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
    Schema::create('countries', function (Blueprint $table) {
        $table->id();
        $table->string('country_name', 100);
        $table->char('country_code', 2)->unique();
        $table->char('currency_code', 3);
        $table->string('region', 100);
        $table->decimal('latitude', 10, 7);
        $table->decimal('longitude', 10, 7);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
