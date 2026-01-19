<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface UserRepoInterface
{
    public function findAll();

    public function findResignedUsers();

    public function create(array $data);

    public function find($id);

    public function update(array $data, $id);

    public function delete($id);

    public function query();
}
