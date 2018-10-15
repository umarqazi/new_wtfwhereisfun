<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EventLayoutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_layouts')->delete();
        $event_layouts = array(
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'layout-1', 'image' => '11.png', 'path' => '', 'sidebar_color' => 'white', 'sidebar_position' => 'right'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'layout-2', 'image' => '22.png', 'path' => '', 'sidebar_color' => 'grey', 'sidebar_position' => 'right'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'layout-3', 'image' => '33.png', 'path' => '', 'sidebar_color' => 'white', 'sidebar_position' => 'left'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'layout-4', 'image' => '44.png', 'path' => '', 'sidebar_color' => 'grey', 'sidebar_position' => 'right'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'layout-5', 'image' => '55.png', 'path' => '', 'sidebar_color' => 'white', 'sidebar_position' => 'right'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'layout-6', 'image' => '66.png', 'path' => '', 'sidebar_color' => 'grey', 'sidebar_position' => 'right'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'layout-7', 'image' => '77.png', 'path' => '', 'sidebar_color' => 'grey', 'sidebar_position' => 'right')
        );
        DB::table('event_layouts')->insert($event_layouts);
    }
}
