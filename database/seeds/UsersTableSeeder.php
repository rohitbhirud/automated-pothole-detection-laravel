<?php

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
        factory(App\User::class, 20)->create();

        $user = new App\User;
        $user->username = "rohitbhirud";
        $user->fullname = "Rohit Bhirud";
        $user->email = "rbhirud7@gmail.com";
        $user->mobile = 8600033008;
        $user->adharno = 499588337722;
        $user->password = Hash::make("512420");
        $user->role = "admin";

        $user->save();
    }
}
