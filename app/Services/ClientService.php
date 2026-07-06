<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepoInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class ClientService
{
    protected $clientRepoInterface;

    public function __construct(ClientRepoInterface $clientRepoInterface)
    {
        $this->clientRepoInterface = $clientRepoInterface;
    }

    public function all()
    {
        return $this->clientRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->clientRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->clientRepoInterface->create($data);
        return $record;
    }


    public function clientDataTable(Request $request)
    {

        $query = $this->clientRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
           
            ->addColumn('client_code', function ($client) {
                return'<span class="badge bg-info ">' . $client->client_code . '</span>';
            })
            ->addColumn('project_code', function ($client) {
                return '<span class="badge bg-primary ">' . $client->project_code . '</span>';
            })
            ->addColumn('site_location', function ($client) {
                return $client->site_location;
            })
            ->addColumn('city', function ($client) {
                return $client->city;
            })
            ->addColumn('length', function ($client) {
                return $client->length;
            })
            ->addColumn('width', function ($client) {
                return $client->width;
            })
            ->editColumn('building_area', function ($client) {
                return $client->building_area;
            })
            ->editColumn('storeys', function ($client) {
                return $client->storeys;
            })
            ->editColumn('construction_type', function ($client) {
                return $client->construction_type;
            })
            ->editColumn('job_scope', function ($client) {
                return $client->job_scope;
            })
            ->editColumn('job_package', function ($client) {
                return $client->job_package;
            })

            ->addColumn('action', function ($client) {
                return view('admin.backend.clientmanage._action', compact('client'))->render();
            })
            ->rawColumns([
                'client_code',
                'project_code',
                'site_location',
                'length',
                'width',
                'building_area',
                'storeys',
                'city',
                'construction_type',
                'job_scope',
                'job_package',
                'action',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->clientRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->clientRepoInterface->find($id);
        $record->delete();
    }
}
