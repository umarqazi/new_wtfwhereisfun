<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->delete();
        $adminUser = array(
            array( 'username' => 'admin', 'password' => Hash::make('admin'), 'name' => 'Administrator', 'avatar' => '', 'remember_token' => '', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'))
        );
        DB::table('admin_users')->insert($adminUser);
    }
}
