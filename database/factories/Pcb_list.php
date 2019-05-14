<?php

use App\Pcb_list;
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
        'board_name' => str_random(6),
        'top_num' => rand(10,99),
        'bot_num' => rand(10,99),
        'unit' => str_random(10), 
        'note' => $faker->sentence(),  
    ];
});
