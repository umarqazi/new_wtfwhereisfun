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

    public function uploadImage($request, $user){
        if($user->hasRole('vendor')){
            $type = 'vendors';
        }else{
            $type = 'customers';
        }
        if($request->hasFile('thumbnail')){
            $fileName = $this->imageService->uploadImage($request->file('thumbnail'), $type, $user->id);
            $this->userRepo->updateProfileImage($fileName, $user->id);
        }
    }

}