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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('schedule_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->enum('consultation_type', ['home_visit', 'clinic', 'online']);
            $table->date('scheduled_date');
            $table->string('scheduled_time');

            // Mother information
            $table->string('mother_name');
            $table->string('mother_phone', 20);
            $table->string('mother_email');
            $table->string('mother_city', 100);
            $table->text('mother_address')->nullable();

            // Pregnancy/feeding status
            $table->string('feeding_status', 50)->nullable();
            $table->string('pregnancy_trimester', 20)->nullable();

            // Baby information
            $table->string('baby_name')->nullable();
            $table->date('baby_birthdate')->nullable();
            $table->integer('baby_age_months')->nullable();
            $table->decimal('baby_weight', 5, 2)->nullable();

            // Consultation details
            $table->text('concerns');
            $table->text('notes')->nullable();
            $table->text('admin_notes')->nullable();

            // Status timestamps
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('cancellation_reason')->nullable();

            // Marketing tracking
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('referrer')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('booking_code');
            $table->index(['status', 'scheduled_date']);
            $table->index('scheduled_date');
            $table->index('mother_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
