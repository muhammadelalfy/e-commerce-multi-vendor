<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'admin',
            'email' => 'admin@info.com',
            'password' => Hash::make('1234567'),
            'phone_number' => '111222333'
        ]);

        DB::table('users')->insert([
            'name' => 'developer',
            'email' => 'developer@info.com',
            'password' => Hash::make('1234567'),
            'phone_number' => '333444555'
        ]);
    }
}
