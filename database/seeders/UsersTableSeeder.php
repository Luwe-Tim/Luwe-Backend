<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username' => 'admin',
            'phone' => '12345',
            'password' => Hash::make('aaaaaa'),
            'role' => 'admin',
            'verified' => true
        ]);
        User::create([
            'username' => 'mufid',
            'phone' => '45678',
            'password' => Hash::make('aaaaaa'),
            'role' => 'customer'
        ]);
        User::create([
            'username' => 'anton',
            'phone' => '78901',
            'password' => Hash::make('aaaaaa'),
            'role' => 'customer'
        ]);
        User::create([
            'username' => 'sultan',
            'phone' => '23456',
            'password' => Hash::make('aaaaaa'),
            'role' => 'pedagang',
            'verified' => true
        ]);
        User::create([
            'username' => 'wahyu',
            'phone' => '56789',
            'password' => Hash::make('aaaaaa'),
            'role' => 'pedagang',
            'verified' => true
        ]);
        User::create([
            'username' => 'budi',
            'phone' => '89012',
            'password' => Hash::make('aaaaaa'),
            'role' => 'customer'
        ]);
        User::create([
            'username' => 'dani',
            'phone' => '34567',
            'password' => Hash::make('aaaaaa'),
            'role' => 'pedagang',
            'verified' => false
        ]);
        User::create([
            'username' => 'jhon',
            'phone' => '67890',
            'password' => Hash::make('aaaaaa'),
            'role' => 'customer'
        ]);
        User::create([
            'username' => 'joko',
            'phone' => '90123',
            'password' => Hash::make('aaaaaa'),
            'role' => 'pedagang',
            'verified' => false
        ]);
        User::create([
            'username' => 'joni',
            'phone' => '01234',
            'password' => Hash::make('aaaaaa'),
            'role' => 'pedagang',
            'verified' => true
        ]);
    }
}
