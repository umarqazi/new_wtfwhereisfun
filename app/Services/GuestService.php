<?php
namespace App\Services;

use App\Repositories\GuestRepo;

class GuestService
{
    /**
     * @var GuestRepo
     */
    protected $guestRepo;

    /**
     * GuestService constructor.
     */
    public function __construct()
    {
        $this->guestRepo = new GuestRepo();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->guestRepo->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->guestRepo->fetch($data);
    }


}