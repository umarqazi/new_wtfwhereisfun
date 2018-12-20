<?php
namespace App\Repositories;

use App\WaitingListSetting;

class WaitListSettingsRepo
{
    /**
     * @var WaitingListSetting
     */
    protected $waitingListSettings;

    /**
     * WaitListSettingsRepo constructor.
     */
    public function __construct()
    {
        $this->waitingListSettings = new WaitingListSetting();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function updateORCreateWaitingListSetting($data, $data1){
        return $this->waitingListSettings->updateOrCreate($data, $data1);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->waitingListSettings->where($data)->first();
    }


}