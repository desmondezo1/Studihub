<?php

use Faker\Generator as Faker;
use Studihub\Models\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->lexify(),
        'slug' => $faker->slug,
        'course_id' => function() {
            return factory(Studihub\Models\Course::class)->create()->id;
        },
        'mime_type' => $faker->mimeType,
        'mime_size' => $faker->randomNumber(),
        'mime_path' => $faker->image("public/img/",640,480, true,true),
        'notes' => $faker->realText(),
        'topic_order' => $faker->randomDigit,
    ];
});
