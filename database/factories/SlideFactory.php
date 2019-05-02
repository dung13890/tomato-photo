<?php

use Faker\Generator as Faker;
use App\Eloquent\Slide;

$factory->define(Slide::class, function (Faker $faker) {
    return [
        'title' => implode(", " ,$faker->words(4, false)),
        'description' => $faker->realText,
        'locked' => rand(0, 1),
    ];
});
