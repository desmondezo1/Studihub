<?php

use Faker\Generator as Faker;
use Studihub\Models\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    $path = "img/vlcsnap-error705.png";
    return [
        'title' => $faker->sentence(8),
        'slug' => $faker->slug,
        'course_id' => function() {
            return factory(Studihub\Models\Course::class)->create()->id;
        },
        'mime_type' => "Image/jpeg",
        'mime_size' => $faker->randomNumber(),
        'mime_path' => $path,
        'notes' => $faker->realText(),
        'topic_order' => $faker->randomDigit,
    ];
});
