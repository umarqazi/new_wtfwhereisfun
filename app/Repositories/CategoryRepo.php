<?php

namespace App\Repositories;

use App\Category;

class CategoryRepo
{
    private $class = 'App\Category';

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll(){
        return Category::all();
    }
}