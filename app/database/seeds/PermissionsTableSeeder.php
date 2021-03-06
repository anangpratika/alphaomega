<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = array(
            array( // 1
                'name'         => 'manage_reports',
                'display_name' => 'manage reports'
            ),
            array( // 2
                'name'         => 'manage_options',
                'display_name' => 'manage options'
            ),
            array( // 3
                'name'         => 'manage_users',
                'display_name' => 'manage users'
            ),
            array( // 4
                'name'         => 'manage_roles',
                'display_name' => 'manage roles'
            ),
        );

        DB::table('permissions')->insert( $permissions );

        DB::table('permission_role')->delete();

        $role_id_admin = Role::where('name', '=', 'admin')->first()->id;
        $role_id_employee = Role::where('name', '=', 'employee')->first()->id;
        $permission_base = (int)DB::table('permissions')->first()->id - 1;

        $permissions = array(
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 1
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 2
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 3
            ),
            array(
                'role_id'       => $role_id_admin,
                'permission_id' => $permission_base + 4
            ),
        );

        DB::table('permission_role')->insert( $permissions );
    }

}