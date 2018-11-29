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

    public function insert($image, $id){
        return $this->eventImage->create(['name' => $image, 'event_id' => $id]);
    }

    public function get($id){
        return $this->eventImage->find($id);
    }

    public function delete($id){
        $this->eventImage->destroy($id);
    }

}