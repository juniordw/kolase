<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('text');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            [
                'key' => 'site_logo',
                'value' => null,
                'type' => 'image',
                'description' => 'Logo utama website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_favicon',
                'value' => null,
                'type' => 'image',
                'description' => 'Favicon website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'admin_logo',
                'value' => null,
                'type' => 'image',
                'description' => 'Logo untuk admin panel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'profile_image',
                'value' => null,
                'type' => 'image',
                'description' => 'Gambar profil default',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_name',
                'value' => 'KOLASE',
                'type' => 'text',
                'description' => 'Nama website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Konselor Menyusui Sepanjang',
                'type' => 'text',
                'description' => 'Tagline website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@kolase.com',
                'type' => 'text',
                'description' => 'Email kontak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_phone',
                'value' => null,
                'type' => 'text',
                'description' => 'Nomor telepon kontak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_whatsapp',
                'value' => null,
                'type' => 'text',
                'description' => 'Nomor WhatsApp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'social_facebook',
                'value' => null,
                'type' => 'text',
                'description' => 'URL Facebook',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'social_instagram',
                'value' => null,
                'type' => 'text',
                'description' => 'URL Instagram',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'social_twitter',
                'value' => null,
                'type' => 'text',
                'description' => 'URL Twitter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
