<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LangkahMembuat;
use Faker\Generator as Faker;

$factory->define(LangkahMembuat::class, function (Faker $faker) {
    return [
        'resep_id' => $faker->numberBetween(1,5),
        'keterangan' => $faker->paragraph,
    ];
});
