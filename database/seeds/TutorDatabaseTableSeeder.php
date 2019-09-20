<?php

use Illuminate\Database\Seeder;

class TutorDatabaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutor = \Studihub\Models\Tutor::firstOrNew(['email' => 'desezo@gmail.com']);
        $tutor->email = 'desezo@gmail.com';
        $tutor->firstname = 'Desmond';
        $tutor->lastname = 'Ezo-Ojile';
        $tutor->password = bcrypt('secretcode');
        $tutor->gender = 'male';
        //Populate dummy student
        $tutor->save();
    }
}
