<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
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
        $faker = Faker::create();
        $users = [];
        for ($i = 0; $i < 200; $i++) {
            $name = $this->generateRandomName();
            $password = $this->generateRandomPassword();
            $email = $faker->unique()->safeEmail;
            $hashedPassword = Hash::make($password);

            $users[] = [
                'name' => $name,
                'password' => $hashedPassword,
                'email' => $email,
                'role' => 'ROLE_USER',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }

    private function generateRandomName()
    {
        $firstNames = ['John', 'Jane', 'Chris', 'Alex', 'Taylor', 'Jordan', 'Morgan', 'Pat'];
        $lastNames = ['Smith', 'Johnson', 'Brown', 'Williams', 'Jones', 'Garcia', 'Miller', 'Davis'];
        return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
    }

    /**
     * Generate a random password with a minimum length of 8 characters.
     *
     * @return string
     */
    private function generateRandomPassword()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Randomly increase password length beyond 8 characters
        for ($i = 0, $extra = rand(0, 8); $i < $extra; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}
