<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'manager',
            'role_id' => 1,
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager'),
        ]);

        User::create([
            'name' => 'client',
            'role_id' => 2,
            'email' => 'client@gmail.com',
            'password' => Hash::make('client'),
        ]);
    }
}
