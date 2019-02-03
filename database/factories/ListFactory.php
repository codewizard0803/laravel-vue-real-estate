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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\ListModel::class, function (Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->words(2, true)),
        'price' => $faker->numberBetween(100, 9999),
        'isOnSale' => $faker->boolean(),
        'city_id' => function () {
            if (\App\City::count()) {
                return \App\City::inRandomOrder()->first()->id;
            }

            return factory(App\City::class)->create()->id;
        },
        'developer_id' => function () {
            if (\App\Developer::count()) {
                return \App\Developer::inRandomOrder()->first()->id;
            }

            return factory(App\Developer::class)->create()->id;
        }
    ];
});
