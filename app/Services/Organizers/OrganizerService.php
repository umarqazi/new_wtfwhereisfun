<?php

namespace App\Services\Organizers;

use App\Repositories\OrganizerRepo;
use App\Services\BaseService;
use App\Services\Events\EventListingService;
use App\Services\IDBService;
use Illuminate\Http\Response;
use App\Services\ImageService;
use App\Services\Organizers\OrganizerImageService;
class OrganizerService extends BaseService implements IDBService
{
    protected $organizerRepo;
    protected $imageService;
    protected $organizerImageService;
    protected $eventListingService;

    public function __construct(){
        $this->organizerRepo            = new OrganizerRepo();
        $this->imageService             = new ImageService();
        $this->organizerImageService    = new OrganizerImageService();
        $this->eventListingService      = new EventListingService();
    }

    public function create($request)
    {
        $organizer = $this->organizerRepo->store($request);
        $this->organizerImageService->uploadImage($request, 'organizers', $organizer->id);
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

    public function getOrganizerBySlug($slug){
        return $this->organizerRepo->getBySlug($slug);
    }

    public function getOrganizerEvents($organizerId){
        $organizer = $this->getOrganizer($organizerId);
        $events = $this->eventListingService->getAllEvents($organizer->vendor->id);
        return $events;
    }

    public function updateOrganizerUrl($organizer,$request){
      return  $this->organizerRepo->updateOrganizerUrl($organizer,$request);
    }

}
