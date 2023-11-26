<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RequestForm;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            'name' => 'Zero Nine',
            'email' => 'trinhduongngoctran@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123@123'), // password
            'remember_token' => Str::random(10),
            'manager_id' => 55,
            'role' => 1,
        ]);
        User::factory(30)->create();
    }
}
