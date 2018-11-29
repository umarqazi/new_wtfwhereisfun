<?php

namespace App\Repositories;

use App\Currency;
class CurrencyRepo
{
    public function getAll(){
        return Currency::all();
    }


}