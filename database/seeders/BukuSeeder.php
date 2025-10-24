<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('buku')->insert([
                'judul' => fake()->sentence(3),
                'penulis' => fake()->name(),
                'harga' => fake()->numberBetween(10000, 50000),
                'tgl_terbit' => fake()->date(),
            ]);
        }
    }
}
