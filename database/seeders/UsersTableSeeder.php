<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        User::create([
            'name' => 'Ishan Sahu',
            'email' => 'ishan@av.com',
            'password' => bcrypt('ishan@av.com'), // Always encrypt the password
            'phone' => '9669433511',
            'dob' => '2004-04-21',
            'address' => 'Bhilai, Chhattisgarh',
            'emp_id' => 'AV001',
            'role' => 'admin',
            'department' => 'Main',
            'team' => 'Core',
            'manager_id' => null, // Admin doesn't report to anyone
            'joining_date' => '2020-01-15',
            'employment_type' => 'full_time',
            'status' => 'active',
            'profile_image' => null,
            'leave_balance' => 15,
            'salary' => 60000.00,
        ]);
    }
}