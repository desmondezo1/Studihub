<?php

use Illuminate\Database\Seeder;
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
        factory(Topic::class, 10)->create();
    }
}
