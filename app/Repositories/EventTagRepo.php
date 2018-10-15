<?php

namespace App\Repositories;

use App\EventTag;
use App\Event;
class EventTagRepo
{
    protected $eventTagModel;
    protected $eventModel;

    public function __construct()
    {
        $this->eventTagModel    =   new EventTag;
        $this->eventModel    =   new Event;
    }

    public function store($request, $event){
        if($request->has('event_tags') && !empty($request->event_tags)){
            $this->deleteExistingTags($event);
            foreach($request->event_tags as $tagName){
                $tag = new EventTag;
                $tag->name      = $tagName;
                $tag->event_id  = $event->id;

                $tag->save();
            }
        }
    }

    public function getEventTags($eventId)
    {
        $event = $this->eventModel->find($eventId);
        return $event->tags;
    }

    public function deleteExistingTags($event){
        $event->tags()->delete();
    }


}