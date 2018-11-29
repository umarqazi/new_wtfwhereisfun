<?php
namespace App\Services;

use App\Repositories\CurrencyRepo;

class CurrencyService extends BaseService implements IDBService
{
    protected $currencyRepo;

    public function __construct()
    {
        $this->currencyRepo = new CurrencyRepo();
    }

    public function create($request)
    {
        // TODO: Implement create() method.
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

    public function getAll()
    {
        return $this->currencyRepo->getAll();
    }
}