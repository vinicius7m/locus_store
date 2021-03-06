<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
// Colocar slug
$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->name,
        'brand' => $faker->name,
        'description' => $faker->sentence, // password
        'body' => $faker->paragraph(5, true),
        'price' => $faker->randomFloat(2,1,10),
        'quantity' => $faker->randomNumber,
    ];
});
