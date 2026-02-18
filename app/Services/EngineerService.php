<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepoInterface;
use App\Repositories\Contracts\EngineerRepoInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class EngineerService
{
    protected $engineerRepoInterface;

    public function __construct(EngineerRepoInterface $engineerRepoInterface)
    {
        $this->engineerRepoInterface = $engineerRepoInterface;
    }

    public function all()
    {
        return $this->engineerRepoInterface->findAll();
    }

    // public function find($id)
    // {
    //     return $this->engineerRepoInterface->find($id);
    // }

    // public function create(array $data)
    // {
    //     $record = $this->engineerRepoInterface->create($data);
    //     return $record;
    // }


    public function engineerDataTable()
    {

        $query = $this->engineerRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()

            ->addColumn('name', function ($engineer) {
                return $engineer->name;
            })

            ->addColumn('projects', function ($engineer) {
                return $engineer->projects
                    ->pluck('name')
                    ->implode(', ');
            })

            ->addColumn('action', function ($engineer) {
                return view('admin.backend.engineers._action', compact('engineer'))->render();
            })
            ->rawColumns([
                'projects',
                'action',
            ])
            ->make(true);
    }

    // public function update($id, array $data)
    // {
    //     // $record = $this->userRepoInterface->find($id);
    //     $record = $this->clientRepoInterface->update($data, $id);
    //     return $record;
    // }

    // public function delete($id)
    // {
    //     $record = $this->clientRepoInterface->find($id);
    //     $record->delete();
    // }
}
