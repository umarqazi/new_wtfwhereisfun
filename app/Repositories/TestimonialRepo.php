<?php

namespace App\Repositories;

use App\Testimonial;
class TestimonialRepo
{
    private $class = 'App\Testimonial';

    private $testimonial;

    public function __construct()
    {
        $this->testimonial = new Testimonial;
    }

    public function index(){
        return Testimonial::all();
    }
}