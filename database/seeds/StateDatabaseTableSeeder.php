<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateDatabaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Abia State',
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Adamawa State',
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Akwa Ibom State',
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Anambra State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Bauchi State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Bayelsa State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Benue State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Borno State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Cross River State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Delta State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Ebonyi State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Edo State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Ekiti State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Enugu State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'FCT'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Gombe State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Imo State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Jigawa State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Kaduna State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Kano State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Katsina State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Kebbi State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Kogi State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Kwara State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Lagos State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Nasarawa State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Niger State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Ogun State'
        ]);
        DB::table('states')->insert([ 'country_id'=> 1,
            'name'=> 'Ondo State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Osun State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Oyo State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Plateau State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Rivers State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Sokoto State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Taraba State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Yobe State'
        ]);
        DB::table('states')->insert([
            'country_id'=> 1,
            'name'=> 'Zamfara State'
        ]);
    }
}
