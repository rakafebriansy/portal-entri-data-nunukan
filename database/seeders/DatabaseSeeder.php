<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yusrina',
            'email' => 'yusrina@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Raka',
            'email' => 'raka@example.com',
            'password' => Hash::make('password'),
            'role' => 'pengentri'
        ]);
        $this->call([KategoriPdrbSeeder::class, KategoriSpSeeder::class]);
        $this->call([DashboardSpSeeder::class, DashboardPdrbSeeder::class]);
    }
}
