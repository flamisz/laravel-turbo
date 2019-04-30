<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->sentence(4),
        'owner_id' => factory(App\User::class)
    ];
});
