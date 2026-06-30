<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'superadmin@ppid.com'],
            [
                'name' => 'Super Admin PPID',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'admin'
            ]
        );

        \App\Models\User::updateOrCreate(
            ['email' => 'petugas@ppid.com'],
            [
                'name' => 'Petugas PPID',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'petugas'
            ]
        );

        \App\Models\User::updateOrCreate(
            ['email' => 'pimpinan@ppid.com'],
            [
                'name' => 'Pimpinan PPID',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'pimpinan'
            ]
        );
    }
}
