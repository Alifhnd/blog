<?php

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

        \App\Model\User::insert([
             'name' => 'ali',
             'email' => 'ali@gmail.com',
             'role'=>'2',
             'password' => bcrypt('123456'),
        ]);
    }
}
