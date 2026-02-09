<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Models\FixedAsset;
use App\Models\Project;
use App\Models\VariableAsset;
use App\Repositories\Contracts\ProjectRepoInterface;

class ProjectRepository implements ProjectRepoInterface
{
    protected $model;

    public function __construct(Project $project)
    {
        $this->model = $project;
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
                'project_category_id',
                'client_id',
                'project_code',
                'project_type',
                'status',
                'start_date',
                'end_date',
                'remark',
            ])
            ->with([
                'project_file',
                'project_categories',
                'client'
            ]);
    }
}
