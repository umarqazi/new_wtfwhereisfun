<?php

namespace App\Jobs;

use Exception;
use App\EventOrder;
use App\Events\WaitListMailingEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class WaitListMailing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $eventOrder;

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
    public function __construct(EventOrder $order)
    {
        $this->eventOrder           = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new WaitListMailingEvent($this->eventOrder->ticket));
    }



    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
    }

}
