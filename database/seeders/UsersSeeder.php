<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::table('users')->insert([
            "name" => "prasta",
            "email" => "prasta72@gmail.com",
            "password" => Hash::make('keren123')
        ]);
    }
}
