<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resep_kategori;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Resep_kategori::class, function (Faker $faker) {
    $name = $faker->sentence(2);
    return [
        'nama' => $name,
        'slug' => Str::slug($name),
    ];
});
