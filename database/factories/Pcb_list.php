<?php

use App\list;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Pcb_list::class, function (Faker $faker) {
    return [
        'board_name' => $faker->sentence(),
        'top_num' => int::random(2),
        'bot_num' => int::random(2),
        'unit' => $faker->sentence(), 
        'note' => $faker->sentence(),
        'description' => $faker->paragraph(),     
    ];
});
