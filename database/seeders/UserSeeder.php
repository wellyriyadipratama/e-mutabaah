<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>null,
            'password'=>Hash::make('admin'),
            'remember_token'=>null,
            'created_at'=>null,
            'updated_at'=>null
        ]);
    }
}
