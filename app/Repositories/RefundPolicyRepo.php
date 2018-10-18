<?php

namespace App\Repositories;

use App\RefundPolicy;
class RefundPolicyRepo
{
    public function getAll(){
        return RefundPolicy::all();
    }
}