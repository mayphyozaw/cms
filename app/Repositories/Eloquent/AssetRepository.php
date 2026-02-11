<?php

namespace App\Repositories\Eloquent;

use App\Models\Asset;
use App\Models\Client;
use App\Models\FixedAsset;
use App\Repositories\Contracts\AssetRepoInterface;

class AssetRepository implements AssetRepoInterface
{
    protected $model;

    public function __construct(Asset $asset)
    {
        $this->model = $asset;
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
                'asset_type',
                'name',
                'category_id',
                'warehouse_id',
                'unit',
                'quantity',
                'status',
                'remarks',
            ])
            ->with([
                'category',
                'warehouse',
                'fixedAsset',
                'variableAsset'
            ]);
    }
}
