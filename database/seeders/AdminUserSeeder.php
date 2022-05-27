<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $adminData = [
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email'  =>'admin@example.com',
            'is_admin' => 1,
            'password' => Hash::make('12345678')
        ];

        User::create($adminData);

    }
}