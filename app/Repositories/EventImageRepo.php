<?php

namespace App\Repositories;

use App\EventImage;
class EventImageRepo
{
    private $eventImage;

    public function __construct()
    {
        $this->eventImage   = new EventImage();
    }

    public function insert($images, $id){
        if(count($images)){
            foreach($images as $key => $img){
                $this->eventImage->create(['name' => $img, 'event_id' => $id]);
            }
        }
    }

}