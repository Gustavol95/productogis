<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\Models\Marcador::class,function(\Faker\Generator $faker){

    return [
        'titulo' => $faker->domainName,
        'snippet' => $faker->text(100),
        'latitud' => $faker->latitude,
        'longitud' => $faker->longitude,
        'draggable' => $faker->boolean(50),
        'flat' => $faker->boolean(50),
        'rotation' => $faker->numberBetween(0,360),
        'z_index' => $faker->randomFloat(1,0,1),
        'type' => $faker->numberBetween(1,5)
    ];
});

$factory->define(\App\Models\Circulo::class,function(\Faker\Generator $faker){

    return [
        'latitud' => $faker->latitude,
        'longitud' => $faker->longitude,
        'radio' => $faker->randomFloat(2,500000,1000000),
        'alpha' => $faker->randomFloat(2,0,1),
        'hue' => $faker->numberBetween(0,360),
        'saturation' => $faker->randomFloat(2,0,1),
        'value' => $faker-> randomFloat(2,0,1)
    ];
});
