<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 8/30/18
 * Time: 2:15 PM
 */

namespace App\Services;


interface IDBService
{
    public function create($request);

    public function update($request);

    public function remove($id);

    public function search($request);

    public function getAll();
}