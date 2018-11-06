<?php

use Illuminate\Database\Seeder;

class AdminRoleUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_role_users')->delete();
        $adminRoleUser = array(
            array( 'role_id' => '1', 'user_id' => '1'),
        );
        DB::table('admin_role_users')->insert($adminRoleUser);
    }
}
