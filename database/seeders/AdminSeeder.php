<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Administrator KOLASE',
            'email' => 'admin@kolase.com',
            'password' => Hash::make('password'),
            'phone' => '089560622054',
            'is_active' => true,
        ]);

        echo "Admin created:\n";
        echo "Email: admin@kolase.com\n";
        echo "Password: password\n";
    }
}
