<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(25)->create();

        \App\Models\User::create([
            'name' => 'Owner Konter',
            'email' => 'owner@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'role' => 'owner',
        ]);

        \App\Models\Aksesoris::factory(5)->create();
        \App\Models\Axis::factory(5)->create();
        \App\Models\Indosat::factory(5)->create();
        \App\Models\Smartfren::factory(5)->create();
        \App\Models\Telkomsel::factory(5)->create();
        \App\Models\Tri::factory(5)->create();
        \App\Models\Xl::factory(5)->create();
        \App\Models\Pemasukan::factory(5)->create();
        \App\Models\Pengeluaran::factory(5)->create();
    }
}
