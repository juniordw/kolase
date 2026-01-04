<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin account
        $this->call([
            AdminSeeder::class,
            ServiceSeeder::class,
            ArticleSeeder::class,
        ]);

        echo "\n";
        echo "==============================================\n";
        echo "  Database Seeding Complete!\n";
        echo "==============================================\n";
        echo "\n";
        echo "  Admin Login Credentials:\n";
        echo "  Email: admin@kolase.com\n";
        echo "  Password: password\n";
        echo "\n";
        echo "==============================================\n";
        echo "\n";
    }
}
