<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Time;
use Faker\Generator as Faker;

$factory->define(Time::class, function (Faker $faker) {
    return [
        'start' => now(),
        'stop' => now()->addMinute(),
        'task_id' => factory(App\Task::class)
    ];
});
