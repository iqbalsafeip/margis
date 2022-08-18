<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',

        ]);
        User::create([
            'username' => 'dosen1',
            'email' => 'dosen1@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
        ]);
        User::create([
            'username' => 'dosen2',
            'email' => 'dosen2@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
        ]);
        User::create([
            'username' => 'dosen3',
            'email' => 'dosen3@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
        ]);
    }
}
