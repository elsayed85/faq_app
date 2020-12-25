<?php

use App\Admin;
use App\User;
use Illuminate\Database\Seeder;
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
        factory(User::class, 10)->create();

        User::create([
            'username' => "osama",
            'password' => Hash::make("password")
        ]);

        Admin::create([
            'name' => "Osama Elzero",
            'email' => "osama.elzero@gmail.com",
            'password' => Hash::make("password")
        ]);
    }
}
