<?php

use Faker\Generator as Faker;
use App\Eloquent\Menu;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'url' => $faker->url,
    ];
});
