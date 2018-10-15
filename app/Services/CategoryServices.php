<?php

namespace App\Services;

use App\Repositories\CategoryRepo;
use App\Category;

class CategoryServices
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryRepo();
    }

    public function getAll(){
        return $this->category->getAll();
    }
}