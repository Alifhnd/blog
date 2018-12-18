<?php

use Faker\Generator as Faker;

$factory->define(App\Model\User::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'password'=> bcrypt('123456')

    ];
});
