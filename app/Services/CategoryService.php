<?php

namespace App\Services;

use App\Repositories\CategoryRepo;
use App\Category;

class CategoryService
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