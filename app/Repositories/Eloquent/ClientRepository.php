<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepoInterface;

class ClientRepository implements ClientRepoInterface
{
    protected $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
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
            'email',
            'phone',
            'address',
            'client_type',
            'client_code',
            'contact_person',
            'project_code',
            'site_location',
            'city',
            'building_area',
            'storeys',
            'construction_type',
            'job_scope',
            'job_package',
        ]);
    }
}
