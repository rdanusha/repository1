<?php

namespace App\Repositories;

interface ClotheRepositoryInterface
{

    public function getByID($id);

    public function all();

    public function delete($id);

    public function update($id, $data);

    public function store($data);

}
