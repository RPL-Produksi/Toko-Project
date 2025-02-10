<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama_lengkap' => env('SUPERADMIN_NAMALENGKAP'),
            'nomor_telp' => env('SUPERADMIN_NOMORTELP'),
            'username' => env('SUPERADMIN_USERNAME'),
            'password' => bcrypt(env('SUPERADMIN_PASSWORD')),
            'role' => env('SUPERADMIN_ROLE'),
        ]);

        User::create([
            'nama_lengkap' => env('ADMIN_NAMALENGKAP'),
            'nomor_telp' => env('ADMIN_NOMORTELP'),
            'username' => env('ADMIN_USERNAME'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'role' => env('ADMIN_ROLE'),
        ]);

        User::create([
            'nama_lengkap' => env('OWNER_NAMALENGKAP'),
            'nomor_telp' => env('OWNER_NOMORTELP'),
            'username' => env('OWNER_USERNAME'),
            'password' => bcrypt(env('OWNER_PASSWORD')),
            'role' => env('OWNER_ROLE'),
        ]);

        User::create([
            'nama_lengkap' => env('KASIR_NAMALENGKAP'),
            'nomor_telp' => env('KASIR_NOMORTELP'),
            'username' => env('KASIR_USERNAME'),
            'password' => bcrypt(env('KASIR_PASSWORD')),
            'role' => env('KASIR_ROLE'),
        ]);
    }
}
