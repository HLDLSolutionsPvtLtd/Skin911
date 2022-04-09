<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Shipping;
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
        $user = User::insert([
            'name' => 'admin',
            'email' =>'admin@test.com',
            'password' => Hash::make('password'),
            'phone_no' => Str::random(10),
            'is_admin' => '1',
        ]);  

        Cart::create([
            'user_id' => $user->id
        ]);

        Shipping::insert([
            'name' => 'default',
            'pincode' => '',
            'fee' => '100',
        ]);
        Shipping::insert([
            'name' => 'free',
            'pincode' => '',
            'fee' => '2800',
        ]);
    }
}
