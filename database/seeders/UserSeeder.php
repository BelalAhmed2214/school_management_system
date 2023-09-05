<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('users')->insert([
            'email' => 'belal@gmail.com',
            'password' => Hash::make('123456789'),
            'first_name' => 'Belal',
            'last_name' => 'Ahmed',
            'role_id'=>Role::ADMIN,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'mostafa@gmail.com',
            'password' => Hash::make('123456789'),
            'first_name' => 'mostafa',
            'last_name' => 'kamel',
            'role_id'=>Role::TEACHER,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'ali@gmail.com',
            'password' => Hash::make('123456789'),
            'first_name' => 'ali',
            'last_name' => 'hamdy',
            'role_id'=>Role::STUDENT,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
