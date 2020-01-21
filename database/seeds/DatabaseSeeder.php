<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(RoleDatabaseSeeder::class);
        //$this->call(AdminTableSeeder::class);
        //$this->call(StudentTableSeeder::class);
        $this->call(CourseTableSeeder::class);
       //$this->call(TopicDatabaseSeeder::class);
        //$this->call(CountryDatabaseTableSeeder::class);
        //$this->call(StateDatabaseTableSeeder::class);
        //$this->call(TutorDatabaseTableSeeder::class);
    }
}
