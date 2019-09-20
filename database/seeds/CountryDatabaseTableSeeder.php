<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryDatabaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Nigeria',
            'sortname' => 'NG',
            'phonecode' => '+234',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
