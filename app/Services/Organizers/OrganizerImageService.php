<?php

namespace App\Services\Organizers;

use App\Repositories\OrganizerRepo;
use App\Services\BaseService;
use App\Services\IService;
use App\Services\ImageService;
use Illuminate\Http\File;
class OrganizerImageService extends BaseService implements IService
{
    protected $organizerRepo;
    protected $imageService;

    public function __construct(){
        $this->organizerRepo    = new OrganizerRepo();
        $this->imageService     = new ImageService();
    }

    public function uploadImage($request, $type, $id){
        if($request->hasFile('thumbnail')){
            $fileName   = $this->imageService->uploadImage($request->file('thumbnail'),$type, $id);
            $updateData = ['thumbnail' => $fileName];
            $this->organizerRepo->updateProfileImage($updateData, $id);
        }

        if($request->hasFile('image')){
            $fileName = $this->imageService->uploadImage($request->file('image'),$type, $id);
            $updateData = ['image' => $fileName];
            $this->organizerRepo->updateProfileImage($updateData, $id);
        }
    }

}