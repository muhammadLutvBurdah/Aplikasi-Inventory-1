<?php


use Illuminate\Database\Seeder;
use App\User;
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
        User::create([
            'name' => 'upihBoy',
            'email' => 'user@gmail.com',
            'password' => hash::make('admin123'),
            'role' => 'petugas'
        ]);
    }
}
