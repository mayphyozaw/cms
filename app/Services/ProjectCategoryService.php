<?php

namespace App\Services;

use App\Models\ProjectCategory;
use App\Repositories\Contracts\ProjectCategoryRepoInterface;
use App\Repositories\Contracts\ProjectRepoInterface;
use App\Repositories\Contracts\VariableAssetRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectCategoryService
{
    protected $projectCategoryRepoInterface;

    public function __construct(ProjectCategoryRepoInterface $projectCategoryRepoInterface)
    {
        $this->projectCategoryRepoInterface = $projectCategoryRepoInterface;
    }

    public function all()
    {
        return $this->projectCategoryRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->projectCategoryRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->projectCategoryRepoInterface->create($data);
        return $record;
    }


    public function projectCategoryDataTable()
    {

        $query = $this->projectCategoryRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()

            ->addColumn('title', function ($project_category) {
                return $project_category->title; // ← existing DB value
            })

            ->addColumn('action', function ($project_category) {
                return view('admin.backend.projectmanage.projectcategory._action', compact('project_category'))->render();
            })

            ->rawColumns([
                'title',
                'action',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        $record = $this->projectCategoryRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->projectCategoryRepoInterface->find($id);
        $record->delete();
    }
}
