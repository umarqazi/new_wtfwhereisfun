<?php

namespace App\Services;

use App\Repositories\TestimonialRepo;
class TestimonialService extends BaseService implements IDBService
{
    protected $testimonial;

    public function __construct(TestimonialRepo $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function getAll(){
        return $this->testimonial->index();
    }

    public function create($request)
    {


    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function search($request)
    {
        // TODO: Implement search() method.
    }
}