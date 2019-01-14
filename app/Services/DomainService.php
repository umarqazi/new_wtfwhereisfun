<?php
namespace App\Services;

use App\Repositories\DomainRepo;
use App\Services\Events\EventTimeLocationService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class DomainService
{
    /**
     * @var DomainRepo
     */
    protected $domainRepo;

    /**
     * @var $eventLocationService
     */
    protected $eventLocationService;

    /**
     * DomainService constructor.
     */
    public function __construct()
    {
        $this->domainRepo           = new DomainRepo();
        $this->eventLocationService = new EventTimeLocationService();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request){
        if(isset($request['event_id'])){
            $eventLocationId = decrypt_id($request['event_id']);
            $organizer_id    = null;
        }else{
            $eventLocationId = null;
            $organizer_id    = decrypt_id($request['organizer_id']);
        }
        $data       = [
            'type'              => $request['type'],
            'domain'            => $request['domain'],
            'event_location_id' => $eventLocationId,
            'organizer_id'      => $organizer_id,
        ];
        return $this->domainRepo->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->domainRepo->fetch($data);
    }

    public function checkDomainExist($subdomain){
        $response = $this->domainRepo->checkDomainExist($subdomain);
        if(!is_null($response)){
            if($response->type == 'event'){
                return Config::get('app.url').'events/'.$response->time_location->event->encrypted_id.'/'.$response->time_location->encrypted_id;
            }else{
                return Config::get('app.url').'organizer/'.$response->organizer->slug;
            }
        }else{
            return Config::get('app.url');
        }
    }
}