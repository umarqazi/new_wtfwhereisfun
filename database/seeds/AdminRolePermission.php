<?php

use Illuminate\Database\Seeder;

class AdminRolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_role_permissions')->delete();
        $adminRolePermission = array(
            array( 'role_id' => '1', 'permission_id' => '1'),
        );
        DB::table('admin_role_permissions')->insert($adminRolePermission);
    }
}
