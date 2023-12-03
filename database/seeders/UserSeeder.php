<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
            'name' => 'Adminstrator',
            'email' => 'coffeshop@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123@123'), // password
            'remember_token' => Str::random(10),
            'role' => 1,
        ]);
        User::factory(5)->create();
    }
}
