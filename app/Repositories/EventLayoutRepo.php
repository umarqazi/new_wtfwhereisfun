<?php

namespace App\Repositories;

use App\EventLayout;
use App\Event;
class EventLayoutRepo
{
    private $eventLayout;
    private $eventModel;

    public function __construct()
    {
        $this->eventLayoutModel = new EventLayout();
        $this->eventModel       = new Event();
    }

    public function getAll(){
        return $this->eventLayoutModel->all();
    }

    public function updateEventLayout($data, $id){
        $this->eventModel->where('id', $id)->update($data);
    }
}