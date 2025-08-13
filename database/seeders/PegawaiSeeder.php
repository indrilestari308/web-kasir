<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        // Superadmin
        User::updateOrCreate(
            ['email' => 'indri30@gmail.com'],
            [
                'name' => 'Indri',
                'password' => Hash::make('121212'),
                'role' => 'superadmin',
            ]
        );

        // Admin
        User::updateOrCreate(
            ['email' => 'niawahyudi30@gmail.com'],
            [
                'name' => 'Nia Wahyudi',
                'password' => Hash::make('121212'),
                'role' => 'admin',
            ]
        );

        // Kasir
        User::updateOrCreate(
            ['email' => 'gibran01@gmail.com'],
            [
                'name' => 'Gibran',
                'password' => Hash::make('121212'),
                'role' => 'kasir',
            ]
        );

        User::updateOrCreate(
            ['email' => 'melisa02@gmail.com'],
            [
                'name' => 'Melisa',
                'password' => Hash::make('121212'),
                'role' => 'kasir',
            ]
        );

        User::updateOrCreate(
            ['email' => 'lestari03@gmail.com'],
            [
                'name' => 'Lestari',
                'password' => Hash::make('121212'),
                'role' => 'kasir',
            ]
        );

        // Pemilik
        User::updateOrCreate(
            ['email' => 'kelompokpemilik@gmail.com'],
            [
                'name' => 'Kelompok',
                'password' => Hash::make('121212'),
                'role' => 'pemilik',
            ]
        );
    }
}
