<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 6:09 PM
 */

namespace App\Services\Events;

use App\Repositories\EventTypeRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
class EventTypeService extends BaseService implements IDBService{

    protected $eventTypeRepo;

    public function __construct()
    {
        $this->eventTypeRepo   = new EventTypeRepo();
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
        return $this->eventTypeRepo->getAll();
    }
}