<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task\Task;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        "url" => $faker->url,
        'user_id' => User::all()->random()
    ];
});
