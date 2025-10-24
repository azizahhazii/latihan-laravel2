<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('user')->insert([
                'nama' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('123456'),
                'tanggal_lahir' => fake()->date(),
                'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                'tinggi_badan_awal' => fake()->numberBetween(140, 190),
                'status_akun' => fake()->randomElement(['aktif', 'nonaktif']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
