<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepoInterface;

class UserRepository implements UserRepoInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
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
        return $this->model->whereNull('resign_date')->select([
            'id',
            'name',
            'email',
            'phone',
            'address',
            'joindate',
            'contact_person',
            'contact_number',
            'role',
            'employeetype',
            'department',
            'employee_number',
            'gender',
            'nrc',
            'status',
            'photo',
            'nrcfrontphoto',
            'nrcbackphoto',
            'householdphoto',
            'referenceletter',
            'is_block',
            'esingphoto',
            'created_at',
        ]);
    }

    public function findResignedUsers()
    {
        return $this->model->whereNotNull('resign_date')->select([
            'id',
            'name',
            'email',
            'phone',
            'address',
            'joindate',
            'contact_person',
            'contact_number',
            'role',
            'employeetype',
            'department',
            'employee_number',
            'gender',
            'nrc',
            'status',
            'photo',
            'nrcfrontphoto',
            'nrcbackphoto',
            'householdphoto',
            'referenceletter',
            'esingphoto',
            'created_at',
            'resign_date',
        ]);
    }
}
