<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AdminPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('admin_permissions')->delete();
        $permissions = array(
            array( 'name' => 'All permission', 'slug' => '*', 'http_method' => '', 'http_path' => '*'),
            array( 'name' => 'Dashboard', 'slug' => 'dashboard', 'http_method' => 'GET', 'http_path' => '/'),
            array( 'name' => 'Login', 'slug' => 'auth.login', 'http_method' => '', 'http_path' => '/auth/login
/auth/logout'),
            array( 'name' => 'User setting', 'slug' => 'auth.setting', 'http_method' => 'GET,PUT', 'http_path' => '/auth/setting'),
            array( 'name' => 'Auth management', 'slug' => 'auth.management', 'http_method' => '', 'http_path' => '/auth/roles
/auth/permissions
/auth/menu
/auth/logs'),
        );
        DB::table('admin_permissions')->insert($permissions);
    }
}
