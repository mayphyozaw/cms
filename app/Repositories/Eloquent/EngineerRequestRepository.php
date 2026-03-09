<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Models\EngineerAssetRequests;
use App\Models\EngineerRequest;
use App\Repositories\Contracts\ClientRepoInterface;
use App\Repositories\Contracts\EngineerRequestRepoInterface;

class EngineerRequestRepository implements EngineerRequestRepoInterface
{
    protected $model;

    public function __construct(EngineerAssetRequests $engineerAssetRequests)
    {
        $this->model = $engineerAssetRequests;
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
            'request_code',
            'request_date',
            'project_id',
            'workscope_id',
            'warehouse_id',
            'user_id',
            'asset_type',
            'status',
            'require_date',
            'remark',
        ]);
    }
}
