<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Studihub\Models\course;
use Studihub\Models\Topic;

class TopicDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Topic::class, 10)->create();
        $courses = Course::all();
        foreach ($courses as $course){
            Topic::firstOrCreate([
                "title" => str::title("This is a topic"),
                "slug" => str::slug("This is a topic"),
                "course_id" => $course->id,
                "isfree" => 1,
                "mime_type" => "video/mp4",
                "mime_size" => 100,
                "mime_path" => "storage/private/".$course->title."/video.mp4",
                "notes" => "This is a topic content",
                "topic_order" => $course->id,
            ]);
        }

    }
}
