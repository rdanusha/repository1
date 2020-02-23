<?php

namespace App\Repositories\Interfaces;

interface BrandRepositoryInterface
{
    public function getByID($id);

    public function all();

    public function delete($id);

    public function update($id, $data);

    public function store($data);
}
