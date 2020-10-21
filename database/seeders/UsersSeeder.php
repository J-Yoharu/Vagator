<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::create([
            'name' => 'john',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('123') 
        ]);
    }
}
