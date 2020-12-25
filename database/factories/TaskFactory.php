<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task\Task;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        "url" => "https://codepen.io/abc/pen/" . $faker->lastName,
        'user_id' => User::all()->random()
    ];
});
