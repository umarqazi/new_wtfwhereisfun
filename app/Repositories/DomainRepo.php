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
        return $this->domain->create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function fetch($data){
        return $this->domain->where($data)->first();
    }
}