<?php
namespace App\Services;

use App\Repositories\WaitListRepo;

class WaitingListService
{
    /**
     * @var WaitListRepo
     */
    protected $waitingListRepo;

    /**
     * WaitingListService constructor.
     */
    public function __construct()
    {
        $this->waitingListRepo = new WaitListRepo();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->waitingListRepo->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->waitingListRepo->fetch($data);
    }

    /**
     * @param $ticketId
     * @return mixed
     */
    public function getTicketWaitingList($ticketId){
        return $this->waitingListRepo->getTicketWaitingList($ticketId);
    }


}