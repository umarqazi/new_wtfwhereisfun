<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepo;
use App\Repositories\OrganizerRepo;
class ImageService extends BaseService implements IService
{
    protected $userRepo;
    protected $organizerRepo;

    public function __construct(){
        $this->userRepo         = new UserRepo();
        $this->organizerRepo    = new OrganizerRepo();
    }

    public function uploadImage($image, $type, $id, $multiple = false){
        $directory = getDirectory($type, $id);
        if(!Storage::exists($directory['relative_path'])){
            Storage::makeDirectory($directory['relative_path']);
        }
        if($multiple){
            $fileName = [];
            foreach($image as $img){
                $path = Storage::putFile($directory['relative_path'], $img);
                $uploadedFileName = basename($path);
                array_push($fileName, $uploadedFileName);
            }
        }else{
            $path = Storage::putFile($directory['relative_path'], $image);
            $fileName = basename($path);
        }
        return $fileName;
    }

    public function deleteImage($type, $id){
        if($type == 'organizers'){
            $fileName = $this->organizerRepo->deleteImage($id);
        }else{
            $fileName = $this->userRepo->deleteImage($id);
        }
        $directory = getDirectory($type, $id);
        Storage::delete($directory['relative_path'].$fileName);
        return true;
    }
}