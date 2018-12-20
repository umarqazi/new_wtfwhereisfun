<?php

namespace App\Jobs;

use App\EventHotDeal;
use App\Services\Events\EventHotDealService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RemoveHotDeal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $eventHotDeal;
    protected $hotDeal;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(EventHotDeal $hotDeal)
    {
        $this->hotDeal    =   $hotDeal;
        $this->eventHotDeal = new EventHotDealService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->eventHotDeal->removeHotDeal($this->hotDeal->time_location_id);
    }
}
