<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 4:57 PM
 */

namespace App\Services;

use App\Repositories\RefundPolicyRepo;
use App\Services\BaseService;
use App\Services\IDBService;
use Illuminate\Http\Response;
class RefundPolicyService extends BaseService implements IDBService
{
    protected $refundPolicyRepo;

    public function __construct(RefundPolicyRepo $refundPolicyRepo){
        $this->refundPolicyRepo = $refundPolicyRepo;
    }


    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function search($request)
    {
        // TODO: Implement search() method.
    }

    public function getAll()
    {
        return $this->refundPolicyRepo->getAll();
    }
}