<?php

use App\Book;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(Book::class, 'default', function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->randomNumber(5),
        'book_type' => 'action',
        'featured_book_id' => $faker->unique()->randomNumber(5),
    ];
});
