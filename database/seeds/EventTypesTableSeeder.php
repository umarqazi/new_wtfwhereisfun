<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->delete();
        $event_types = array(
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Appearance or Signing', 'slug' => 'appearance-or-signing'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Tour', 'slug' => 'tour'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Computer and It', 'slug' => 'computer-and-it'),
        );
        DB::table('event_types')->insert($event_types);
    }
}
