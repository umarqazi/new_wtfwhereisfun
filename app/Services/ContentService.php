<?php

namespace App\Services;

use App\Repositories\ContentRepo;
class ContentService
{
    protected $contentRepo;

    public function __construct(ContentRepo $contentRepo)
    {
        $this->contentRepo = $contentRepo;
    }

    public function getContent($type){
        return $this->contentRepo->getContent($type);
    }
}