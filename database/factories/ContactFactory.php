<?php

use Faker\Generator as Faker;
use App\Eloquent\Contact;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company' => $faker->company,
        'email' => $faker->companyEmail,
        'message' => $faker->realText,
    ];
});
