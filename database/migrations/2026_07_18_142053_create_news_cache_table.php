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
    Schema::create('news_cache', function (Blueprint $table) {

        $table->id();

        $table->foreignId('country_id')
              ->constrained('countries')
              ->cascadeOnDelete();

        $table->string('title');

        $table->string('source');

        $table->text('url');

        $table->timestamp('published_at');

        $table->string('sentiment',20)->nullable();

        $table->text('summary')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_cache');
    }
};
