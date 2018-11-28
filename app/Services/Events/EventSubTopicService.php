<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 6:27 PM
 */

namespace App\Services\Events;

use App\Repositories\EventSubTopicRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
class EventSubTopicService
{
    protected $eventSubTopicRepo;

    public function __construct()
    {
        $this->eventSubTopicRepo   = new EventSubTopicRepo();
    }

    public function getTopicSubTopics($id, $requestType=''){
        $subTopics = $this->eventSubTopicRepo->getTopicSubTopics($id);
        if($requestType == 'ajax'){
            $options = '';
            foreach($subTopics as $topic){
                $options .= "<option value='{$topic->id}'>{$topic->name}</option>";
            }
            return response()->json($options);
        }else{
            return $subTopics;
        }
    }
}