<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->password = Hash::make('12345678');
        $user->email = 'admin@example.com';
        $user->name = 'Admin';
        $user->role = User::ROLE_ADMIN; 
        $user->save();

        $user = new User();
        $user->password = Hash::make('12345678');
        $user->email = 'manager@example.com';
        $user->role = User::ROLE_MANAGER; 
        $user->name = 'Manager';
        $user->save();

        $user = new User();
        $user->password = Hash::make('12345678');
        $user->email = 'kndmfy@gmail.com';
        $user->role = User::ROLE_USER; 
        $user->name = 'Candy';
        $user->save();

        $this->call(CancerStatisticsTableSeeder ::class);            
        // \App\Models\User::factory(10)->create();
    }
}
