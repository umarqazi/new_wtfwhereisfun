<?php
namespace App\Repositories;

use App\WaitList;

class WaitListRepo
{
    /**
     * @var WaitingList
     */
    protected $waitingList;

    /**
     * WaitListSettingsRepo constructor.
     */
    public function __construct()
    {
        $this->waitList = new WaitList();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->waitList->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->waitList->where($data)->get();
    }

    /**
     * @param $ticketId
     * @return mixed
     */
    public function getTicketWaitingList($ticketId){
        return $this->waitList->where('ticket_id', $ticketId)->get();
    }




}