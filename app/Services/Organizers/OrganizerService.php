<?php

namespace App\Services\Organizers;

use App\Repositories\OrganizerRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;

class OrganizerService extends BaseService implements IDBService
{
    protected $organizerRepo;

    public function __construct(OrganizerRepo $organizerRepo){
        $this->organizerRepo = $organizerRepo;
    }

    public function create($request)
    {
        return $this->organizerRepo->store($request);
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
        return $this->organizerRepo->getAll();
    }

    public function getUserOrganizers(){
        return $this->organizerRepo->userOrganizers();
    }

    public function getOrganizer($id){
        return $this->organizerRepo->getOrganizer($id);
    }

    public function profileUpdate($request, $id){
        return $this->organizerRepo->profileUpdate($request, $id);
    }

    public function profileColorsUpdate($request, $id){
        return $this->organizerRepo->profileColorsUpdate($request, $id);
    }
}
