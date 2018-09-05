<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        factory(App\User::class, 5)->create()->each(function($user){
            $user->assignRole(1);
        });
        factory(App\User::class, 5)->create()->each(function($user){
            $user->assignRole(2);
        });
        factory(App\User::class, 1)->create(['email' => 'jazib.javed@gems.techverx.com'])->each(function($user){
            $user->assignRole(2);
        });
        factory(App\User::class, 1)->create(['email' => 'admin@site.com'])->each(function($user){
            $user->assignRole(4);
        });
        factory(App\User::class, 1)->create(['email' => 'djnino609@gmail.com'])->each(function($user){
            $user->assignRole(4);
        });
        Model::reguard();
    }
}
