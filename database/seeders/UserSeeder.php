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
        $users = [
            [
                'title' => 'Mr.',
                'first_name' => 'Mohamed',
                'last_name' => 'Said',
                'username' => 'moh',
                'password' => bcrypt('madyrio@100'),
                'email' => 'madyrio100@gmail.com',
                'gender_id' => 2, // Male
                'email_verified_at' => now(),
                'role' => 'super-admin'
            ]
        ];


        foreach ($users as $user) {
            User::firstOrCreate([
                'first_name' => $user['first_name'],
                'title' => $user['title'],
                'last_name' => $user['last_name'],
                'username' => $user['username'],
                'gender_id' => $user['gender_id'],
                'password' => $user['password'],
                'email_verified_at' => $user['email_verified_at'],
                'email' => $user['email'],
            ])->assignRole($user['role']);
        }
    }
}
