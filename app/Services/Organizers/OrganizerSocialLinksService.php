<?php

namespace App\Services\Organizers;

use App\Repositories\OrganizerRepo;
use App\Services\BaseService;
use Illuminate\Http\Response;
class OrganizerSocialLinksService extends BaseService
{
    protected $organizerRepo;

    public function __construct(OrganizerRepo $organizerRepo)
    {
        $this->organizerRepo = $organizerRepo;
    }

    public function socialLinksUpdate($request, $id){
        return $this->organizerRepo->socialLinksUpdate($request, $id);
    }

}