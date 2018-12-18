<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Post\Entities\Tag::class, function (Faker $faker) {
    return [
        'title'=>$faker->title,
    ];
});
