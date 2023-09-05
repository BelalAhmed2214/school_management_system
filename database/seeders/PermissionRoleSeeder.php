<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed the pivot table with permission-role relationships
        $permissionRoleRelationships = [
            [
                'role_id' => Role::ADMIN, // Admin role
                'permission_id' => Permission::CREATE, // Create permission
            ],
            [
                'role_id' =>  Role::ADMIN, // Admin role
                'permission_id' =>  Permission::READ, // Read permission
            ],
            [
                'role_id' => Role::TEACHER, // Teacher role
                'permission_id' => Permission::READ, // Read permission
            ],

        ];

        DB::table('roles_permissions')->insert($permissionRoleRelationships);
    }

}
