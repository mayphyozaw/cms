<?php

namespace App\Repositories\Eloquent;

use App\Models\ProjectCategory;
use App\Repositories\Contracts\ProjectCategoryRepoInterface;

class ProjectCategoryRepository implements ProjectCategoryRepoInterface
{
    protected $model;

    public function __construct(ProjectCategory $projectCategory)
    {
        $this->model = $projectCategory;
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
        return $this->model
            ->select([
                'id',
                'title',
            ]);
    }
}
