<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/4/18
 * Time: 4:59 PM
 */

namespace App\Repositories;

use App\RefundPolicy;
class RefundPolicyRepo
{
    public function getAll(){
        return RefundPolicy::all();
    }
}