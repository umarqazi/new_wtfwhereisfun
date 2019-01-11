<?php
namespace App\Services;

use App\Repositories\DomainRepo;

class DomainService
{
    /**
     * @var DomainRepo
     */
    protected $domainRepo;

    /**
     * DomainService constructor.
     */
    public function __construct()
    {
        $this->domainRepo = new DomainRepo();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->domainRepo->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->domainRepo->fetch($data);
    }
}