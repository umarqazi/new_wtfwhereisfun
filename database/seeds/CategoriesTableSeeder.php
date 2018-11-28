<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = array(
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Sports', 'slug' => 'sports', 'image' => '1521472638-e8f345c7-6199-9d91-b20e-f53fd1ec29f6.jpg', 'thumbnail' => '1521472638-e8f345c7-6199-9d91-b20e-f53fd1ec29f6_thumb.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Concerts', 'slug' => 'concerts', 'image' => '1521472667-fd83edbf-71a3-ae5e-e0f5-a750e20411ff.jpg', 'thumbnail' => '1521472667-fd83edbf-71a3-ae5e-e0f5-a750e20411ff_thumb.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Nightlife', 'slug' => 'nightlife', 'image' => '1521472821-2c721980-dc97-815f-5c5e-e2301de93893.jpg', 'thumbnail' => '1521472821-2c721980-dc97-815f-5c5e-e2301de93893_thumb.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Family', 'slug' => 'family', 'image' => '1521473381-b75bd294-0181-945b-34d1-12d207af76d6.jpg', 'thumbnail' => '1521473381-b75bd294-0181-945b-34d1-12d207af76d6_thumb.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Food & Drinks', 'slug' => 'food-drinks', 'image' => '1521473482-b356d751-8b38-3a37-3b39-206c06c72d7f.jpg', 'thumbnail' => '1521473482-b356d751-8b38-3a37-3b39-206c06c72d7f_thumb.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Visual Art', 'slug' => 'visual-art', 'image' => '1521569573-af3e3496-0219-e4a9-1208-166599e448e8.jpg', 'thumbnail' => '1521569573-af3e3496-0219-e4a9-1208-166599e448e8_thumb.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Charity', 'slug' => 'charity', 'image' => '1521570200-8234a718-c46c-1950-32e0-5f0a4416ba0f.jpg', 'thumbnail' => '1521570200-8234a718-c46c-1950-32e0-5f0a4416ba0f_thumb.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => '+More', 'slug' => 'more', 'image' => '1532610209-b0e21b57-c738-e675-45b3-aef3bb881bf3.jpg', 'thumbnail' => '1532610209-b0e21b57-c738-e675-45b3-aef3bb881bf3.jpg'),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => 'Networking', 'slug' => 'networking', 'image' => '1532612485-8682115f-26a9-10d2-eed2-9f668a0b4041.jpeg', 'thumbnail' => '1532612485-8682115f-26a9-10d2-eed2-9f668a0b4041.jpeg')
        );
        DB::table('categories')->insert($categories);
    }
}
