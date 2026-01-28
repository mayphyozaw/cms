<?php

namespace App\Repositories\Eloquent;

use App\Models\FixedAssetCategory;
use App\Repositories\Contracts\CategoryRepoInterface;

class CategoryRepository implements CategoryRepoInterface
{
    protected $fixedasset_category;

    public function __construct(FixedAssetCategory $fixedasset_category)
    {
        $this->model = $fixedasset_category;
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
            'category_name',
        ]);
    }
}
