<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kendaraan::create([
            'jenis' => 'Large Dozer',
            'tahun_pembuatan' => '2021',
            'status' => 1,
        ]);
        Kendaraan::create([
            'jenis' => 'Dump Truck',
            'tahun_pembuatan' => '2022',
            'status' => 1,
        ]);
        Kendaraan::create([
            'jenis' => 'Scraper',
            'tahun_pembuatan' => '2020',
            'status' => 1,
        ]);
    }
}
