<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Super Admin',
                'email' => 'super_admin@gmail.com',
                'password' => Hash::make('super_admin'),
                'role' => 'super_admin',
                'phone' => '08xxxxxxxxxx',
                'avatar' => '',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'phone' => '08xxxxxxxxxx',
                'avatar' => '',
            ],
        ];

        DB::table('users')->insert($data);
    }
}
