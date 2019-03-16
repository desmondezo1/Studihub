<?php

use Illuminate\Database\Seeder;
use Studihub\Models\Role;
use Studihub\Models\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrNew(['email' => 'admin@studihub.com.ng']);
        $admin->firstname = 'Desmond';
        $admin->lastname = 'Admin';
        $admin->email = 'admin@studihub.com.ng';
        $admin->phone = '0809876655';
        $admin->gender = 'male';
        $admin->password = bcrypt('secretcode');
        $admin->remember_token = str_random(10);
        //Populate dummy users
        $admin->save();
        $role = Role::where('name', 'admin')->first();
        //$admin->setRole($role);
        $admin->roles()->attach($role->id);
    }
}
