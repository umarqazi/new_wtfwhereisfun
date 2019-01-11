<?php
namespace App\Repositories;

use App\PayoutDetail;

class PayoutDetailRepo
{
    /**
     * @var PayoutDetail
     */
    protected $payoutDetail;

    /**
     * PayoutDetailRepo constructor.
     */
    public function __construct()
    {
        $this->payoutDetail = new PayoutDetail();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->payoutDetail->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->payoutDetail->where($data)->first();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function listing($data){
        return $this->payoutDetail->where($data)->get();
    }

    /**
     * @param $data1
     * @param $data2
     * @return mixed
     */
    public function updateOrCreate($data1, $data2){
        return $this->payoutDetail->updateOrCreate($data1, $data2);
    }

}