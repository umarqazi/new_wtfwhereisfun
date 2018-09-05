<?php


namespace App\Repositories;

use App\Content;
class ContentRepo
{
    public function getContent($type){
        return Content::where('type', $type)->first();
    }

}