<?php

namespace App\Repositories;

use App\Category;

class CategoryRepo
{
    private $class = 'App\Category';

    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAll(){
        return Category::all();
    }
}