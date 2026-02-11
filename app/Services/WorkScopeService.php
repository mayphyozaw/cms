<?php

namespace App\Services;

use App\Models\ProjectCategory;
use App\Repositories\Contracts\ProjectCategoryRepoInterface;
use App\Repositories\Contracts\ProjectRepoInterface;
use App\Repositories\Contracts\VariableAssetRepoInterface;
use App\Repositories\Contracts\WorkScopeRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class WorkScopeService
{
    protected $workScopeRepoInterface;

    public function __construct(WorkScopeRepoInterface $workScopeRepoInterface)
    {
        $this->workScopeRepoInterface = $workScopeRepoInterface;
    }

    public function all()
    {
        return $this->workScopeRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->workScopeRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->workScopeRepoInterface->create($data);
        return $record;
    }


    public function workscopeDataTable()
    {

        $query = $this->workScopeRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()

            ->addColumn('title', function ($work_scope) {
                return $work_scope->title; 
            })

            ->addColumn('action', function ($work_scope) {
                return view('admin.backend.projectmanage.workscope._action', compact('work_scope'))->render();
            })

            ->rawColumns([
                'title',
                'action',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        $record = $this->workScopeRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->workScopeRepoInterface->find($id);
        $record->delete();
    }
}
