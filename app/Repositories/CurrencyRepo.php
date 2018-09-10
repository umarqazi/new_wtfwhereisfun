<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 9/6/18
 * Time: 11:44 AM
 */

namespace App\Repositories;

use App\Currency;
class CurrencyRepo
{
    public function getAll(){
        return Currency::all();
    }


}