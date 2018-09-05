<?php

namespace App\Repositories;

use App\Testimonial;
class TestimonialRepo
{
    private $class = 'App\Testimonial';

    private $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function index(){
        return Testimonial::all();
    }
}