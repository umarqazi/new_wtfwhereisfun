<?php
namespace App\Services;

use App\Repositories\PayoutDetailRepo;
use App\Repositories\WaitListRepo;

class PayoutDetailService
{
    /**
     * @var PayoutDetailRepo
     */
    protected $payoutDetailRepo;

    /**
     * PayoutDetailService constructor.
     */
    public function __construct()
    {
        $this->payoutDetailRepo = new PayoutDetailRepo();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->payoutDetailRepo->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->payoutDetailRepo->fetch($data);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function listing($data){
        return $this->payoutDetailRepo->listing($data);
    }


    /**
     * @param $data1
     * @param $data2
     * @return mixed
     */
    public function updateOrCreate($data1, $data2){
        return $this->payoutDetailRepo->updateOrCreate($data1, $data2);
    }

}