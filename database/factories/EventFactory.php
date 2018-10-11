<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ja_JP');
    return [
        'user_id' => $faker->randomDigit() + 1,
        'name' => $faker->sentence($nbWords = 5, $variableNbWords = false),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'readme' => $faker->realText($maxNbChars = 255, $indexSize = 2),
        'published' => $faker->boolean(50),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
