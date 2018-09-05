<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 7:54 PM
 */

namespace App\Repositories;

use App\EventTopic;
use App\EventSubTopic;
class EventSubTopicRepo
{
    public function getTopicSubTopics($id){
        return EventTopic::find($id)->sub_topics;
    }
}