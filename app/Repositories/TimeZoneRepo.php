<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/6/18
 * Time: 12:15 PM
 */

namespace App\Repositories;

use App\Timezone;
class TimeZoneRepo
{
    public function getAll(){
        return Timezone::all();
    }
}