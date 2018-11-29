<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RefundPolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refund_policies')->delete();
        $policies = array(
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'text' => "No Refund"),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => "Refunds available until 1 day before the event"),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => "Refunds available until 2 day before the event"),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => "Refunds available until 3 day before the event"),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'name' => "Refunds available until 7 day before the event")
        );
        DB::table('refund_policies')->insert($policies);
    }
}
