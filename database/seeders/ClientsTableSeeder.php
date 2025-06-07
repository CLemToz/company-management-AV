<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        // Get the first user or create one if none exists
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => \Illuminate\Support\Facades\Hash::make('password')
            ]
        );

        Client::create([
            'name' => 'Acme Corp',
            'email' => 'acme@example.com',
            'phone' => '+1234567890',
            'industry' => 'Tech',
            'tags' => json_encode(['VIP', 'High Value']),
            'created_by' => $user->id
        ]);
    }
}