<?php
namespace App\Services;

use App\Repositories\GuestListRepo;

class GuestListService
{
    /**
     * @var GuestListRepo
     */
    protected $guestListRepo;

    /**
     * GuestListService constructor.
     */
    public function __construct()
    {
        $this->guestListRepo = new GuestListRepo();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->guestListRepo->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->guestListRepo->fetch($data);
    }


}