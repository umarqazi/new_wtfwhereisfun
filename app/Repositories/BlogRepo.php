<?php
namespace App\Repositories;

use App\Blog;

class BlogRepo
{
    private $class = 'App\Blog';

    private $blog;

    public function __construct()
    {
        $this->blog = new Blog;
    }

    public function getAll(){
        return $this->blog->all();
    }

    public function getById($id){
        return $this->blog->find($id);
    }
}