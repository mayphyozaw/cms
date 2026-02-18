<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Models\EngineerAssign;
use App\Models\User;
use App\Repositories\Contracts\EngineerRepoInterface;

class EngineerRepository implements EngineerRepoInterface
{
    protected $model;

    public function __construct(EngineerAssign $engineerAssign)
    {
        $this->model = $engineerAssign;
    }
    // public function findAll()
    // {
    //     return $this->model->all();
    // }
    // public function find($id)
    // {
    //     return $this->model->findOrFail($id);
    // }
    // public function create(array $data)
    // {
    //     return $this->model->create($data);
    // }

    // public function update(array $data, $id)
    // {
    //     $record = $this->model->find($id);
    //     $record->update($data);
    //     return $record;
    // }
    // public function delete($id)
    // {
    //     $record = $this->model->find($id);
    //     return $record->delete();
    // }

    public function query()
    {
        return User::where('department', 'Engineer')
            ->with('projects');
    }
}
