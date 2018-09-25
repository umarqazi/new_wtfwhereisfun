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

    public function __construct(UserRepo $userRepo, OrganizerRepo $organizerRepo){
        $this->userRepo         = $userRepo;
        $this->organizerRepo    = $organizerRepo;
    }

    public function uploadImage($request, $type, $id){
        $directory = getDirectory($type, $id);
        if(!Storage::exists($directory['relative_path'])){
            Storage::makeDirectory($directory['relative_path']);
        }
        $path = Storage::putFile($directory['relative_path'], $request->file('thumbnail'));
        $fileName = basename($path);
        if($type == 'organizers'){
            $this->organizerRepo->updateProfileImage($fileName, $id);
        }else{
            $this->userRepo->updateProfileImage($fileName, $id);
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