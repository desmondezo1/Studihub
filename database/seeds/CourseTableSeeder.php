<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*        $path = "physics.png";
        $category = \Studihub\Models\CourseCategory::create(["category"=>"Sciences", "exam_type"=>"Jamb"]);
        $course = Course::firstOrNew([
            "title" => str::title("Physics"),
            "slug" => str_slug("physics"),
            "summary" => "This course belongs to the sciences category",
            "photo" => $path,
        ]);
        $course->category()->associate($category);
        $course->save();

        $path = "mathematics.png";
        $category = \Studihub\Models\CourseCategory::create(["category"=>"Mathematics", "exam_type"=>"Jamb"]);
        $course = Course::firstOrNew([
            "title" => str::title("Mathematics"),
            "slug" => str_slug("Mathematics"),
            "summary" => "This course belongs to the sciences category",
            "photo" => $path,
        ]);
        $course->category()->associate($category);
        $course->save();

        $path = "img/subject_icons/chemistry.png";
        $category = \Studihub\Models\CourseCategory::create(["category"=>"Chemistry", "exam_type"=>"Jamb"]);
        $course = Course::firstOrNew([
            "title" => str::title("Chemistry"),
            "slug" => str_slug("Chemistry"),
            "summary" => "This course belongs to the sciences category",
            "image_path" => $path,
        ]);
        $course->category()->associate($category);
        $course->save();*/
        
    }
}
