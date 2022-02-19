<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::insert([
            'name' => 'admin',
            'email' =>'admin@test.com',
            'password' => Hash::make('password'),
            'phone_no' => Str::random(10),
            'is_admin' => '1',
        ]);
    }
}
