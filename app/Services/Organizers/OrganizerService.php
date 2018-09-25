<?php

namespace App\Services\Organizers;

use App\Repositories\OrganizerRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
use App\Services\ImageService;
class OrganizerService extends BaseService implements IDBService
{
    protected $organizerRepo;
    protected $imageService;

    public function __construct(OrganizerRepo $organizerRepo, ImageService $imageService){
        $this->organizerRepo    = $organizerRepo;
        $this->imageService     = $imageService;
    }

    public function create($request)
    {
        $organizer = $this->organizerRepo->store($request);
        if($request->hasFile('thumbnail')){
            $this->imageService->uploadImage($request, 'organizers', $organizer->id);
        }
        return $organizer;
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
