<?php

namespace App\Services;

use App\Repositories\ContentRepo;
class ContentService
{
    protected $contentRepo;

    public function __construct()
    {
        $this->contentRepo = new ContentRepo;
    }

    public function getContent($type){
        return $this->contentRepo->getContent($type);
    }
}