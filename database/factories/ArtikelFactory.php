<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artikel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Artikel::class, function (Faker $faker) {
    $judul = $faker->sentence(6);
    return [
        'judul' => $judul,
        'slug' => Str::slug($judul),
        'deskripsi' => $faker->paragraph,
    ];
});
