<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'post' => $faker->text,
        'user_id' => factory(App\User::class),
    ];
});
