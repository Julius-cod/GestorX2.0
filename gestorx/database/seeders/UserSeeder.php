<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Master',
            'email' => 'admin@gestorx.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Gestor XPTO',
            'email' => 'gestor@gestorx.com',
            'password' => Hash::make('123456'),
            'role' => 'gestor',
        ]);

        User::create([
            'name' => 'Operador Junior',
            'email' => 'operador@gestorx.com',
            'password' => Hash::make('123456'),
            'role' => 'operador',
        ]);
    }
}
