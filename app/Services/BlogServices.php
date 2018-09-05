<?php

namespace App\Services;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Repositories\BlogRepo;

class BlogServices extends Service implements IService
{
    protected $blog;

    public function __construct(BlogRepo $blog)
    {
        $this->blog = $blog;
    }

    public function getAll(){
        return $this->blog->index();
    }
}