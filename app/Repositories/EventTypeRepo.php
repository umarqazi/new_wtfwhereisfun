<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 6:10 PM
 */

namespace App\Repositories;

use App\EventType;
class EventTypeRepo
{
    public function getAll(){
        return EventType::all();
    }
}