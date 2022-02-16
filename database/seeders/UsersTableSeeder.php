<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Amr Azzam',
                'email' => 'amrazzm@gmail.com' ,
                'password' => Hash::make('123'),
                'photo' => 'null' ,
                'role' => 'admin'

            ] ,
            [
                'name' => 'Ayman Ramdan',
                'email' => 'ayman@gmail.com' ,
                'password' => Hash::make('123'),
                'photo' => 'null' ,
                'role' => 'vendor'
            ]
        ]);
    }
}
