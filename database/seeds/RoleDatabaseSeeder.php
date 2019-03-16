<?php

use Illuminate\Database\Seeder;
use Studihub\Models\Permission;
use Studihub\Models\Role;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create($this->roles(), $this->map());
    }


    private function roles()
    {
        $rows = [
            'admin' => [
                'admin-admin-dashboard-controller' => 'c,r,u,d',
                'admin-admin-settings-controller' => 'c,r,u,d',
                'admin-admin-course-controller' => 'c,r,u,d',
                'admin-admin-topic-controller' => 'c,r,u,d',
                'admin-admin-question-controller' => 'c,r,u,d',
                'admin-admin-choice-controller' => 'c,r,u,d',
                'admin-admin-student-controller' => 'c,r,u,d',
                'admin-admin-user-controller' => 'c,r,u,d',
                'admin-admin-role-controller' => 'c,r,u,d',
                'admin-admin-enrolled-course-controller' => 'c,r,u,d',
                'admin-admin-student-answer-controller' => 'c,r,u,d',

            ],

            'teacher' => [
                'admin-admin-dashboard-controller' => 'r',
                'admin-admin-course-controller' => 'r',
                'admin-admin-topic-controller' => 'c,r,u',
                'admin-admin-question-controller' => 'c,r,u',
                'admin-admin-choice-controller' => 'c,r,u',
                'admin-admin-student-controller' => 'c,r,u',
                'admin-admin-enrolled-course-controller' => 'c,r,u',
                'admin-admin-student-answer-controller' => 'c,r,u',
                ],

            'manager' => [
                'admin-admin-dashboard-controller' => 'c,r',
                'admin-settings-controller'=> 'r',
                'admin-admin-course-controller' => 'c,r',
                'admin-admin-topic-controller' => 'c,r',
                'admin-admin-question-controller' => 'c,r',
                'admin-admin-choice-controller' => 'c,r',
                'admin-admin-student-controller' => 'c,r',
                'admin-admin-user-controller' => 'c,r',
                'admin-admin-role-controller' => 'c,r',
                'admin-admin-enrolled-course-controller' => 'c,r',
                'admin-admin-student-answer-controller' => 'c,r',
            ],
            'moderator' => [
                'admin-admin-dashboard-controller' => 'r',
                'admin-settings-controller'=> 'r',
                'admin-admin-course-controller' => 'r',
                'admin-admin-topic-controller' => 'r',
                'admin-admin-question-controller' => 'r',
                'admin-admin-choice-controller' => 'r',
                'admin-admin-student-controller' => 'r',
                'admin-admin-role-controller' => 'r',
                'admin-admin-enrolled-course-controller' => 'r',
                'admin-admin-student-answer-controller' => 'r',
            ],
        ];

        return $rows;
    }

    private function map()
    {
        $rows = [
            'c' => 'create',
            'r' => 'read',
            'u' => 'update',
            'd' => 'delete'
        ];

        return $rows;
    }

    private function create($roles, $map)
    {
        $mapPermission = collect($map);

        foreach ($roles as $key => $modules) {
            // Create a new role
            $role = Role::create([
                'name' => $key,
                'display_name' => ucwords(str_replace("_", " ", $key)),
                'description' => ucwords(str_replace("_", " ", $key))
            ]);

            $this->command->info('Creating Role ' . strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {
                $permissions = explode(',', $value);

                foreach ($permissions as $p => $perm) {
                    $permissionValue = $mapPermission->get($perm);

                    $moduleName = ucwords(str_replace("-", " ", $module));

                    $permission = Permission::firstOrCreate([
                        'name' => $permissionValue . '-' . $module,
                        'display_name' => ucfirst($permissionValue) . ' ' . $moduleName,
                        'description' => ucfirst($permissionValue) . ' ' . $moduleName,
                    ]);

                    $this->command->info('Creating Permission to ' . $permissionValue . ' for ' . $moduleName);

                    if (!$role->hasPermission($permission->name)) {
                        $role->attachPermission($permission);
                    } else {
                        $this->command->info($key . ': ' . $p . ' ' . $permissionValue . ' already exist');
                    }
                }
            }
        }
    }
}
