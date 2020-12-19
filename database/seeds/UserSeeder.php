<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user2 = User::create(['name' => 'Mohamed Aiman', 'email' => 'a@g.com', 'password' => bcrypt('password')]);
        $user3 = User::create(['name' => 'Aiman', 'email' => 'muhammadhu.aiman@gmail.com', 'password' => bcrypt('password')]);

    }
}
