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
    Schema::create('risk_events', function (Blueprint $table) {

        $table->id();

        $table->foreignId('country_id')
              ->constrained('countries')
              ->cascadeOnDelete();

        $table->string('event_type',50);

        $table->string('title');

        $table->text('description')->nullable();

        $table->enum('severity',[
            'Low',
            'Medium',
            'High',
            'Critical'
        ]);

        $table->string('source',50);

        $table->dateTime('event_date');

        $table->enum('status',[
            'Active',
            'Resolved'
        ])->default('Active');

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_events');
    }
};
