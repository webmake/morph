<?php

use App\ReaderBook;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(ReaderBook::class, 'default', function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->randomNumber(5),
        'reader_id' => $faker->randomNumber(5),
        'book_id' => $faker->randomNumber(5),
    ];
});
