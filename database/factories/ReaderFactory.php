<?php

use App\Reader;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(Reader::class, 'default', function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->randomNumber(5),
        'name' => $faker->name,
    ];
});
