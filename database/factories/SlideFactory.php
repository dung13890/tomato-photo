<?php

use Faker\Generator as Faker;
use App\Eloquent\Slide;

$factory->define(Slide::class, function (Faker $faker) {
    return [
        'description' => implode(", " ,$faker->words(4, false)),
        'locked' => rand(0, 1),
    ];
});
