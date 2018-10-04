<?php

namespace App\Services\Events;

use App\Repositories\EventImageRepo;
use App\Services\BaseService;
use App\Services\IService;
use App\Services\ImageService;
use Illuminate\Http\File;
class EventImageService extends BaseService implements IService
{
    protected $eventImageRepo;
    protected $imageService;

    public function __construct(){
        $this->eventImageRepo         = new EventImageRepo();
        $this->imageService           = new ImageService();
    }

    public function uploadImage($request, $type, $id, $imageType){
        if($imageType == 'header'){
            if($request->hasFile('header_image')){
                $fileName = $this->imageService->uploadImage($request->file('header_image'),$type, $id);
                return $fileName;
            }
        }else{
            if(count($request->hasFile('gallery_image'))){
                $fileName = $this->imageService->uploadImage($request->file('gallery_image'),$type, $id, true);
                $this->eventImageRepo->insert($fileName, $id);
            }
        }
    }


}