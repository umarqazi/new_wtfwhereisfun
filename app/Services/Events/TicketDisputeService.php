<?php
/**
 * @author adeel
 * @package
 * @copyright 2018 Techverx.com
 * @project new_wtfwhereisfun
 */


/**
 * Created by PhpStorm.
 * User: adeel
 * Date: 11/22/18
 * Time: 7:40 PM
 */

namespace App\Services\Events;
use App\Services\BaseService;
use App\Services\IService;
use App\Repositories\TicketDisputeRepo;


class TicketDisputeService extends BaseService implements IService
{
    protected $disputeRepo;

    public function __construct(){
        $this->disputeRepo      = new TicketDisputeRepo();
    }

    public function getByUserId($id)
    {
        return $this->disputeRepo->getByUserId($id);
    }

    public function getById($id)
    {
        return $this->disputeRepo->getById($id);
    }

    public function getByOrderId($id)
    {
        return $this->disputeRepo->getByOrderId($id);
    }

    public function store($request,$id){
       return $this->disputeRepo->store($request,$id);
    }

    public function getVendorDisputes($eventIds){
        return $this->disputeRepo->getVendorDisputes($eventIds);
    }

    public function closeDispute($dispute)
    {
        return $this->disputeRepo->closeDispute($dispute);
    }

    public function disputeReply($request)
    {
        return $this->disputeRepo->reply($request);
    }


}