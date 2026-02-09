<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PermissionRepoInterface;
use App\Repositories\Contracts\RoleRepoInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepository implements PermissionRepoInterface
{
    protected $model;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }
    public function findAll()
    {
        return $this->model->all();
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        $record->update($data);
        return $record;
    }
    public function delete($id)
    {
        $record = $this->model->find($id);
        return $record->delete();
    }

    
    public function query()
    {
        return $this->model->select([
            'id',
            'name',
        ]);
    }
}
