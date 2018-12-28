<?php
namespace App\Repositories;

use App\GuestList;

class GuestListRepo
{
    /**
     * @var GuestList
     */
    protected $guestList;

    /**
     * GuestListRepo constructor.
     */
    public function __construct()
    {
        $this->guestList = new GuestList();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->guestList->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->guestList->where($data)->paginate(100);
    }


}