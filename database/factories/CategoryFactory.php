<?php

use Faker\Generator as Faker;
use App\Eloquent\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'title' => $faker->jobTitle,
        'type' => $faker->randomElement(config('common.category.type')),
        'description' => $faker->realText,
        'locked' => rand(0, 1),
    ];
});
