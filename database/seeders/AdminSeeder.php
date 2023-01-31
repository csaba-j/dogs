<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "csaba.juhasz.338@gmail.com",
            'email_verified_at' => now(),
            'password' => 'admin123123', // password
            'remember_token' => Str::random(10),
            'is_admin' => true
        ]);
    }
}
