<?php

use Faker\Generator as Faker;

$factory->define(App\EventParticipant::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit() + 1,
        'event_id' => $faker->randomDigit() + 1,
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
