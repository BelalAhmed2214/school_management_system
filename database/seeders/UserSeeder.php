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
            'name' => 'Belal Ahmed',
            'role_id'=>Role::ADMIN,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'mostafa@gmail.com',
            'password' => Hash::make('123456789'),
            'name' => 'Mostafa Kamel',
            'role_id'=>Role::TEACHER,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'osama@gmail.com	',
            'password' => Hash::make('123456789'),
            'name' => 'Osama Gamal',
            'role_id'=>Role::TEACHER,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'hassan@gmail.com',
            'password' => Hash::make('123456789'),
            'name' => 'Hassan Hammam',
            'role_id'=>Role::TEACHER,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'ali@gmail.com',
            'password' => Hash::make('123456789'),
            'name' => 'Ali Hamdy',
            'role_id'=>Role::STUDENT,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'omar@gmail.com',
            'password' => Hash::make('123456789'),
            'name' => 'Omar Shaaban	',
            'role_id'=>Role::STUDENT,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'email' => 'kamal@gmail.com',
            'password' => Hash::make('123456789'),
            'name' => 'Kamal	',
            'role_id'=>Role::STUDENT,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



    }
}
