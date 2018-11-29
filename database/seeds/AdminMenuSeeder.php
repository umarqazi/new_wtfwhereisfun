<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu')->delete();
        $adminMenu = array(
            array( 'parent_id' => '0', 'order' => '1', 'title' => 'Vendors', 'icon' => 'fa-users', 'uri' => 'auth/vendors', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '2', 'title' => 'Customers', 'icon' => 'fa-user', 'uri' => 'auth/customers' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '3', 'title' => 'Events', 'icon' => 'fa-calendar-check-o', 'uri' => 'auth/events' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '4', 'title' => 'Categories', 'icon' => 'fa-certificate', 'uri' => 'auth/categories' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '5', 'title' => 'Event Types', 'icon' => 'fa-list-alt', 'uri' => 'auth/event-types' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '6', 'title' => 'Event Topics', 'icon' => 'fa-pencil', 'uri' => 'auth/event-topics' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '7', 'title' => 'Blogs', 'icon' => 'fa-bold', 'uri' => 'auth/blogs' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '8', 'title' => 'Content', 'icon' => 'fa-file-text', 'uri' => 'auth/contents' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array( 'parent_id' => '0', 'order' => '9', 'title' => 'Testimonials', 'icon' => 'fa-comment', 'uri' => 'auth/testimonials' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'))
        );
        DB::table('admin_menu')->insert($adminMenu);
    }
}
