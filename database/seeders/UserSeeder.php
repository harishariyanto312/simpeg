<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name'      => 'Administrator',
            'group_id'  => 1,
            'username'  => 'admin',
            'email'     => 'harishariyanto299@gmail.com',
            'password'  => Hash::make('password')
        ]);

        User::create([
            'name'      => 'Haris',
            'group_id'  => 2,
            'username'  => 'haris',
            'email'     => 'harishariyanto312@gmail.com',
            'password'  => Hash::make('password')
        ]);
    }
}
