<?php

use Faker\Generator as Faker;
use App\Eloquent\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'ceo_keywords' => implode(", " ,$faker->words(4, false)),
        'description' => $faker->realText,
        'locked' => rand(0, 1),
    ];
});
