<?php

namespace App\Services\Events;

use App\Repositories\EventImageRepo;
use App\Services\BaseService;
use App\Services\IService;
use App\Services\ImageService;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class EventImageService extends BaseService implements IService
{
    protected $eventImageRepo;
    protected $imageService;

    public function __construct(){
        $this->eventImageRepo         = new EventImageRepo();
        $this->imageService           = new ImageService();
    }


    public function addNewImage($request){
        return addNewImage($request);
    }

    public function uploadImage($request, $type, $id, $imageType){
        if($imageType == 'header'){
            if($request->hasFile('header_image')){
                $fileName = $this->imageService->uploadImage($request->file('header_image'),$type, $id);
                return $fileName;
            }
        }else{
            if($request->hasFile('gallery_image')){
                $fileName = $this->imageService->uploadImage($request->file('gallery_image'), $type, $id);
                $image = $this->eventImageRepo->insert($fileName, $id);
                return encrypt_id($image->id);
            }
        }
    }

    public function removeImage($imageId){
        $id             = decrypt_id($imageId);
        $imageDetails   = $this->eventImageRepo->get($id);
        $directory      = getDirectory('events', $imageDetails->event_id);
        Storage::delete($directory['relative_path'].$imageDetails->name);
        $this->eventImageRepo->delete($id);
        return true;
    }


}