<?php


namespace App\Repositories;


use App\Models\Brands;
use App\Repositories\Interfaces\BrandRepositoryInterface;

class BrandRepository implements BrandRepositoryInterface
{
    public function getByID($id)
    {
        // TODO: Implement getByID() method.
    }

    public function all()
    {
        return Brands::all();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    public function store($data)
    {
        // TODO: Implement store() method.
    }
}
