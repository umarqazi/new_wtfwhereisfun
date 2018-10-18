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
    public function handle(EventHotDeal $hotDeal)
    {
        $this->eventHotDeal->removeHotDeal($hotDeal->event_id);
    }
}
