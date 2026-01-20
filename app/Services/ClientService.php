<?php

namespace App\Services;

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
            ->addColumn('client_type', function ($client) {
                return $client->client_type;
            })
            ->editColumn('client_type', function ($client) {
                $color = match ($client->client_type) {
                    'Individual' => 'bg-primary',
                    'Company' => 'bg-info',
                    default => 'bg-danger',
                };

                return '<span class="badge badge-status ' . $color . '">' . $client->client_type . '</span>';
            })
            ->addColumn('client_code', function ($client) {
                return $client->client_code;
            })
            ->addColumn('project_code', function ($client) {
                return $client->project_code;
            })
            ->addColumn('site_location', function ($client) {
                return $client->site_location;
            })
            ->addColumn('city', function ($client) {
                return $client->city;
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
                'client_type',
                'client_code',
                'project_code',
                'site_location',
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
