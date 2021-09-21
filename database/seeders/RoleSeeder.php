<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'super-admin'
            ], [
                'name' => 'appraisee', 'permissions' => [
                    ['personal-information', 'action' => ['view']],
                    ['performance-agreement', 'action' => ['view']],
                    ['mid-year-review', 'action' => ['view']],
                    ['revised-objective', 'action' => ['view']],
                    ['annual-review', 'action' => ['view']],
                    ['attribute-good-performance', 'action' => ['view']],
                    ['overall-perfomance', 'action' => ['view']],
                    ['sanction-reward', 'action' => ['view']],
                    ['attachment', 'action' => ['view']],
                    ['opras', 'action' => ['view', 'archive', 'submit']],
                    ['archive', 'action' => ['view', 'show']],
                ]
            ], [
                'name' => 'supervisee', 'permissions' => [
                    ['opras', 'action' => ['review']],
                    ['performance-agreement', 'action' => ['review']],
                    ['mid-year-review', 'action' => ['review']],
                    ['revised-objective', 'action' => ['review']],
                    ['annual-review', 'action' => ['review']],
                    ['attribute-good-performance', 'action' => ['review']],
                    ['overall-perfomance', 'action' => ['review']],
                    ['sanction-reward', 'action' => ['review']],
                    ['attachment', 'action' => ['review']],
                ]
            ], [
                'permissions' => [
                    ['personal-information', 'action' => ['update', 'create', 'complete']],
                    ['performance-agreement', 'action' => ['update', 'create', 'delete', 'foward']],
                    ['mid-year-review', 'action' => ['update', 'foward']],
                    ['revised-objective', 'action' => ['update', 'create', 'delete', 'foward']],
                    ['annual-review', 'action' => ['update', 'foward']],
                    ['opras', 'action' => ['create', 'delete']],
                    ['attribute-good-performance', 'action' => ['store', 'foward']],
                    ['overall-perfomance', 'action' => ['update', 'foward']],
                    ['attachment', 'action' => ['update', 'create', 'delete']],
                ]
            ]
        ];


        foreach ($roles as $role) {
            if (isset($role['name'])) { // if role is found create it
                $roleInstance = Role::firstOrCreate([
                    'name' => $role['name']
                ]);
                echo "Role $roleInstance->name  created \n";
            }

            foreach ($role['permissions']??[] as $permission) {
                foreach ($permission['action'] as $action) {
                    $permissionInstance = Permission::firstOrCreate(['name' => $permission[0].'-'.$action]);
                    echo "Permission $permissionInstance->name  created \n";
                    if (isset($role['name'])) { // if role was created give permissions to that role
                        $roleInstance->givePermissionTo($permissionInstance->name);
                    }
                }
            }
        }
    }
}
