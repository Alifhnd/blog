<?php

use Faker\Generator as Faker;
use App\Model\User;

$factory->define(\Modules\Post\Entities\Post::class, function (Faker $faker) {
    return [
        'post_title'=>$faker->title,
        'post_content'=>$faker->text,
        'post_slug'=>$faker->title,
    ];
});
