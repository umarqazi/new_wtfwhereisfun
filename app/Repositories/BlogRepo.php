<?php
namespace App\Repositories;

use App\Blog;

class BlogRepo
{
    private $class = 'App\Blog';

    private $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function index(){
        return Blog::all();
    }
}