<?php

use Faker\Generator as Faker;

$factory->define(Studihub\Models\Course::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'slug' => $faker->slug,
        'summary' => $faker->text(150),
        'image_path' => $faker->image(null,640,480, true,true),
    ];
});
