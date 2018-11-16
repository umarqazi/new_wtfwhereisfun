<?php
namespace App\Repositories;

use App\EventTicket;
class EventTicketRepo
{
    protected $ticketModel;

    public function __construct()
    {
        $this->ticketModel = new EventTicket();
    }

    public function getTicketById($id){
        return $this->ticketModel->findOrFail($id)->load('event');
    }

}