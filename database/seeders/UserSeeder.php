<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            //admin
            [
                'name' => 'Admin',
                'username'=>'admin',
                'email' => 'admin@gmail.com',
                'role'=>'admin',
                'status'=>'active',
                'password' => Hash::make('111'),
                'created_at'=>Carbon::now(),

            ],
            //agent
            [
                'name' => 'Manager',
                'username'=>'manager',
                'email' => 'manager@gmail.com',
                'role'=>'manager',
                'status'=>'active',
                'password' => Hash::make('111'),
                'created_at'=>Carbon::now(),

            ],
            //user
            [
                'name' => 'User',
                'username'=>'user',
                'email' => 'user@gmail.com',
                'role'=>'user',
                'status'=>'active',
                'password' => Hash::make('111'),
                'created_at'=>Carbon::now(),

            ],

        ]);
    }
}
