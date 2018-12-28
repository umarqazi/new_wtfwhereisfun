<?php
namespace App\Repositories;

use App\Guest;

class GuestRepo
{
    /**
     * @var Guest
     */
    protected $guest;

    /**
     * GuestRepo constructor.
     */
    public function __construct()
    {
        $this->guest = new Guest();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->guest->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->guest->where($data)->paginate(100);
    }


}