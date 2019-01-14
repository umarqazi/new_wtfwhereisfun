<?php
namespace App\Repositories;

use App\Domain;

/**
 * Class DomainRepo
 * @package App\Repositories
 */
class DomainRepo
{
    /**
     * @var Domain
     */
    protected $domain;

    /**
     * DomainRepo constructor.
     */
    public function __construct()
    {
        $this->domain = new Domain();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        if($data['type'] == 'organizer'){
            return $this->domain->updateOrCreate(['organizer_id' => $data['organizer_id']], $data);
        }else{
            return $this->domain->updateOrCreate(['event_location_id' => $data['event_location_id']], $data);
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->domain->where($data)->first();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function checkDomainExist($subdomain){
        return $this->domain->where('domain', $subdomain)->first();
    }


}