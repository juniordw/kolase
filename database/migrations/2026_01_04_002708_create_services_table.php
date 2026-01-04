<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->text('short_description');
            $table->text('full_description');
            $table->json('features');
            $table->json('target_clients')->nullable();
            $table->json('cases_handled')->nullable();
            $table->integer('duration_minutes')->default(60);
            $table->decimal('price', 12, 2)->nullable();
            $table->string('price_note')->nullable();
            $table->string('icon', 100)->nullable();
            $table->string('image')->nullable();
            $table->json('available_types');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('badge', 50)->nullable();
            $table->string('badge_color', 20)->nullable();
            $table->date('launch_date')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->string('seo_keywords')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
