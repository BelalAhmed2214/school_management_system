<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([

        ]);

        DB::table('users')->insert([
            'email' => 'belal@gmail.com',
            'password' => Hash::make('123456789'),
            'first_name' => 'Belal',
            'last_name' => 'Ahmed',
            'role_id'=>1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
