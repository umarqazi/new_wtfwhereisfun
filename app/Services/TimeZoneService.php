<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/6/18
 * Time: 12:13 PM
 */

namespace App\Services;

use App\Repositories\TimeZoneRepo;
class TimeZoneService
{
    protected $timeZoneRepo;

    public function __construct()
    {
        $this->timeZoneRepo = new TimeZoneRepo();
    }

    public function getAll(){
        return $this->timeZoneRepo->getAll();
    }
}