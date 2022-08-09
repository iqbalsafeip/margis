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
            'username' => 'pimpinan',
            'email' => 'pimpinan@gmail.com',
            'password' => bcrypt('pimpinan'),
            'role' => 'pimpinan',
        ]);
    }
}
