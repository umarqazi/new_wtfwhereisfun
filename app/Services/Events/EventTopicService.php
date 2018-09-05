<?php
namespace App\Services\Events;

use App\Repositories\EventTopicRepo;
use App\Repositories\EventRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
class EventTopicService extends BaseService implements IDBService{

    protected $eventTopicRepo;
    protected $eventRepo;

    public function __construct(EventTopicRepo $eventTopicRepo, EventRepo $eventRepo)
    {
        $this->eventTopicRepo   = $eventTopicRepo;
        $this->eventRepo   = $eventRepo;
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function search($request)
    {
        // TODO: Implement search() method.
    }

    public function getAll()
    {
        return $this->eventTopicRepo->getAll();
    }

    public function updateTopics($request, $id){
        return $this->eventRepo->updateTopics($request, $id);
    }
}
