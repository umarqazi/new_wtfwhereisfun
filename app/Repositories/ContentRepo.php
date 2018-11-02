<?php


namespace App\Repositories;

use App\ContentPage;
class ContentRepo
{
    public function getContent($type){
        return ContentPage::where('type', $type)->first();
    }

}