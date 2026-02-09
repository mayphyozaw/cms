<?php

namespace App\Services;

use App\Models\ProjectCategory;
use App\Repositories\Contracts\ProjectRepoInterface;
use App\Repositories\Contracts\VariableAssetRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectService
{
    protected $projectRepoInterface;

    public function __construct(ProjectRepoInterface $projectRepoInterface)
    {
        $this->projectRepoInterface = $projectRepoInterface;
    }

    public function all()
    {
        return $this->projectRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->projectRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->projectRepoInterface->create($data);
        return $record;
    }



    // public function projectDataTable()
    // {
    //     $query = $this->projectRepoInterface
    //         ->query()
    //         ->with('client'); // IMPORTANT: avoid N+1

    //     $categories = ProjectCategory::all();

    //     $dataTable = DataTables::eloquent($query)
    //         ->addIndexColumn()
    //         ->editColumn('client_name', fn($project) => $project->client->name ?? '')
    //         ->editColumn('project_code', fn($project) => $project->client->project_code ?? '')
    //         ->editColumn('start_date', fn($project) => $project->start_date);

    //     /** ✅ ADD CATEGORY COLUMNS ONE BY ONE */
    //     foreach ($categories as $category) {
    //         $dataTable->addColumn('category_' . $category->id, function ($project) use ($category) {

    //             $progress = $project->getCategoryProgress($category->id);
    //             $color = $progress == 100 ? 'bg-success' : 'bg-danger';
    //             $icon  = $progress == 100
    //                 ? '<i class="ti ti-check text-success"></i>'
    //                 : '<i class="ti ti-x text-danger"></i>';

    //             return '
    //             <div class="progress" style="height:8px;">
    //                 <div class="progress-bar ' . $color . '" style="width:' . $progress . '%"></div>
    //             </div>
    //             ' . $icon . '
    //             <small class="d-block">
    //                 <a href="javascript:void(0)"
    //                    onclick="ShowModal(' . $project->id . ', ' . $category->id . ')">
    //                    Manage File
    //                 </a>
    //             </small>
    //         ';
    //         });
    //     }

    //     $dataTable->addColumn('action', function ($project) {
    //         return view('admin.backend.projectmanage.projects._action', compact('project'))->render();
    //     });

    //     /** ✅ RAW COLUMNS (ONLY ONCE) */
    //     $dataTable->rawColumns(
    //         array_merge(
    //             ['action'],
    //             $categories->map(fn($c) => 'category_' . $c->id)->toArray()
    //         )
    //     );

    //     return $dataTable->make(true);
    // }


    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->projectRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->projectRepoInterface->find($id);
        $record->delete();
    }
}
