<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mailinator.com',
            'password' => bcrypt('qwerty12345'),
            'email_verified_at' => now()
        ])
        ->assignRole('administrator');

        User::create([
            'name' => 'agent',
            'email' => 'agent@mailinator.com',
            'password' => bcrypt(123456789),
            'email_verified_at' => now()
        ])
        ->assignRole('agent');
    }
}
