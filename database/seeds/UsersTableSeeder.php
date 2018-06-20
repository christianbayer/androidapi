<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Christian Bayer',
            'email'    => 'christian.bayer@universo.univates.br',
            'password' => bcrypt('123456'),
        ]);
    }
}
