<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->word .'の件について',
        'content' => $faker->realText(300),
        'person_in_charge' => $faker->name,
    ];
});
