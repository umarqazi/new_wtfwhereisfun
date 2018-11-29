<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 5:52 PM
 */

namespace App\Repositories;

use App\EventTopic;
class EventTopicRepo
{
    public function getAll(){
        return EventTopic::all();
    }

}