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
        User::Create([
            'name' => 'Director',
            'email' => 'admin@admin.com',
            'rol' => 'Director',
            'phone_number' => '12345678',
            'password' => bcrypt('123456789'),
        ]);
    }
}
