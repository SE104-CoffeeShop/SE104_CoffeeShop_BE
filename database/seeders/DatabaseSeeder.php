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
        RequestForm::insert([

            [
                'type' => 'expected',
                'sender_id' => 2,
                'manager_id' => 1,
                'start_date' => '2023-11-03 00:00:00',
                'end_date' => '2023-11-09 00:00:00',
                'status' => 'pending',
                'reason' => 'Co viec ban',
            ],
            [
                'type' => 'expected',
                'sender_id' => 3,
                'manager_id' => 1,
                'start_date' => '2023-11-03 00:00:00',
                'end_date' => '2023-11-09 00:00:00',
                'status' => 'pending',
                'reason' => 'dau bung',
            ],

            [
                'type' => 'expected',
                'sender_id' => 3,
                'manager_id' => 1,
                'start_date' => '2023-11-03 00:00:00',
                'end_date' => '2023-11-09 00:00:00',
                'status' => 'pending',
                'reason' => 'dau bung',
            ],

            [
                'type' => 'expected',
                'sender_id' => 3,
                'manager_id' => 1,
                'start_date' => '2023-11-03 00:00:00',
                'end_date' => '2023-11-09 00:00:00',
                'status' => 'reject',
                'reason' => 'dau bung',
            ],
            [
                'type' => 'expected',
                'sender_id' => 3,
                'manager_id' => 1,
                'start_date' => '2023-11-03 00:00:00',
                'end_date' => '2023-11-09 00:00:00',
                'status' => 'accepted',
                'reason' => 'dau bung',
            ],
            [
                'type' => 'expected',
                'sender_id' => 1,
                'manager_id' => 3,
                'start_date' => '2023-11-03 00:00:00',
                'end_date' => '2023-11-09 00:00:00',
                'status' => 'reject',
                'reason' => 'dau bung',
            ],
            [
                'type' => 'expected',
                'sender_id' => 1,
                'manager_id' => 2,
                'start_date' => '2023-11-03 00:00:00',
                'end_date' => '2023-11-09 00:00:00',
                'status' => 'accepted',
                'reason' => 'dau bung',
            ],

        ]);
    }
}
