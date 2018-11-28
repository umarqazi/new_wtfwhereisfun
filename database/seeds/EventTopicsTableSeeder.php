<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventTopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_topics')->delete();
        $event_topics = array(
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Music', 'slug' => 'music'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Fashion & Beauty', 'slug' => 'fashion-beauty'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Sports', 'slug' => 'sports'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Software Code', 'slug' => 'software-code'),
        );
        DB::table('event_topics')->insert($event_topics);

        DB::table('event_sub_topics')->delete();
        $event_sub_topics = array(
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Hip Hop', 'slug' => 'hip-hop', 'event_topic_id' => 1),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Latin', 'slug' => 'latin', 'event_topic_id' => 1),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Beauty', 'slug' => 'beauty', 'event_topic_id' => 2),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Cricket', 'slug' => 'cricket', 'event_topic_id' => 3),
        );
        DB::table('event_sub_topics')->insert($event_sub_topics);
    }
}
