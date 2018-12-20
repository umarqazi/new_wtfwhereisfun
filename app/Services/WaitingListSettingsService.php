<?php
namespace App\Services;

use App\Repositories\WaitListSettingsRepo;

class WaitingListSettingsService
{
    /**
     * @var WaitListSettingsRepo
     */
    protected $waitingListSettingsRepo;

    /**
     * WaitingListSettingsService constructor.
     */
    public function __construct()
    {
        $this->waitingListSettingsRepo = new WaitListSettingsRepo();
    }

    /**
     * @param $data
     * @param $data1
     * @return mixed
     */
    public function updateORCreateWaitingListSetting($data, $data1){
        return $this->waitingListSettingsRepo->updateORCreateWaitingListSetting($data, $data1);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->waitingListSettingsRepo->fetch($data);
    }


}