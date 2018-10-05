<?php
namespace App\Services\Events;

use App\Services\BaseService;
use App\Services\IService;
use App\Services\Events\EventImageService;
use App\Repositories\EventLayoutRepo;
use App\Repositories\EventImageRepo;
class EventLayoutService  extends BaseService implements IService
{
    protected $eventLayoutRepo;
    protected $eventImageService;
    protected $eventImageRepo;

    public function __construct(){
        $this->eventLayoutRepo      = new EventLayoutRepo();
        $this->eventImageRepo       = new EventImageRepo();
        $this->eventImageService    = new EventImageService();
    }

    public function getAll(){
        return $this->eventLayoutRepo->getAll();
    }

    public function updateEventLayout($request){
        $id = decrypt_id($request->event_id);
        if($request->hasFile('header_image')){
            $headerImageName = $this->eventImageService->uploadImage($request, 'events', $id, 'header');
            $updateData = ['event_layout_id' => $request->event_layout, 'header_image' => $headerImageName];
        }else{
            $updateData = ['event_layout_id' => $request->event_layout ];
        }
        $this->eventLayoutRepo->updateEventLayout($updateData, $id);
    }
}