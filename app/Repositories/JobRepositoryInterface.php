<?php

namespace App\Repositories;

interface JobRepositoryInterface
{
    public function all();

    public function findById($JobId);

    public function create($data);

    public function update($data);

    public function delete($id);

    public function filters();
}
