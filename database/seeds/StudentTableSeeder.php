<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //student database seeded here
        $student = \Studihub\Models\Student::firstOrNew(['email' => 'desezo@gmail.com']);
        $student->email = 'desezo@gmail.com';
        $student->username = 'desezo';
        $student->firstname = 'Desmond';
        $student->lastname = 'Ezo-Ojile';
        $student->password = bcrypt('Desmondezo1');
        $student->remember_token = str_random(10);
        //Populate dummy student
        $student->save();
    }
}
