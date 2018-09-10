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

    public function __construct(TimeZoneRepo $timeZoneRepo)
    {
        $this->timeZoneRepo = $timeZoneRepo;
    }

    public function getAll(){
        return $this->timeZoneRepo->getAll();
    }
}