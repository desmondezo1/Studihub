<?php

use Illuminate\Database\Seeder;
use Studihub\Models\Course;
class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //student database seeded here
        factory(Course::class, 10)->create();
    }
}
