<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ini ngebuat untuk akun Admin
        User::create([
            'name' => 'Muhamad Lutv',
            'email' => 'lutv@gmail.com',
            'password' => hash::make('123'),
            'role' => 'admin'
        ]);

        
    }
}
