<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Models\FixedAsset;
use App\Repositories\Contracts\FixedAssetRepoInterface;

class FixedAssetRepository implements FixedAssetRepoInterface
{
    protected $model;

    public function __construct(FixedAsset $fixedAsset)
    {
        $this->model = $fixedAsset;
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
        $record = $this->model->findOrFail($id);
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
        return $this->model
            ->select([
                'id',
                'assets_code',
                'name',
                'warehouse_id',
                'category_id',
                'unit',
                'total_qty',
                'status',
                'remarks',
            ])
            ->with(['category', 'warehouse']);
    }
}
