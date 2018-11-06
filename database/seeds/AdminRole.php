<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AdminRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('admin_roles')->delete();
        $adminRoles = array(
            array( 'name' => 'Administrator', 'slug' => 'administrator', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'))
        );
        DB::table('admin_roles')->insert($adminRoles);
    }
}
