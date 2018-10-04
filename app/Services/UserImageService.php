<?php

namespace App\Services;

use App\Repositories\UserRepo;
use App\Services\BaseService;
use App\Services\IService;
use App\Services\ImageService;
use Illuminate\Http\File;
class UserImageService extends BaseService implements IService
{
    protected $userRepo;
    protected $imageService;

    public function __construct(){
        $this->userRepo    = new UserRepo();
        $this->imageService     = new ImageService();
    }

    public function uploadImage($request, $type, $id){
        if($request->hasFile('thumbnail')){
            $fileName = $this->imageService->uploadImage($request->file('thumbnail'),$type, $id);
            $this->userRepo->updateProfileImage($fileName, $id);
        }
    }

}