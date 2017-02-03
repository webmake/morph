<?php

use App\ActionBook;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(ActionBook::class, 'default', function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->randomNumber(5),
        'name' => $faker->name,
    ];
});
