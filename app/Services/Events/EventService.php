<?php
namespace App\Services\Events;

use App\Repositories\EventRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
class EventService extends BaseService implements IDBService
{
    protected $eventRepo;

    public function __construct(EventRepo $eventRepo){
        $this->eventRepo = $eventRepo;
    }

    public function create($request)
    {
        return $this->eventRepo->create($request);
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
        // TODO: Implement getAll() method.
    }

    public function getByID($id)
    {
        return $this->eventRepo->getByID($id);
    }
}