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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->time('end_time')->nullable();
            $table->enum('type', ['home_visit', 'clinic', 'online', 'regular'])->default('regular');
            $table->integer('max_bookings')->default(1);
            $table->integer('current_bookings')->default(0);
            $table->boolean('is_available')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();

            // Indexes for better performance
            $table->index(['date', 'is_available']);
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
