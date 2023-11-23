<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BahanResep;
use Faker\Generator as Faker;

$factory->define(BahanResep::class, function (Faker $faker) {
    return [
        'resep_id' => $faker->numberBetween(1,5),
        'keterangan' => $faker->paragraph,
    ];
});
