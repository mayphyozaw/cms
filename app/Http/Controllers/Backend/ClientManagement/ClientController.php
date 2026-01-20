<?php

namespace App\Http\Controllers\Backend\ClientManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientService->all();
        return view('admin.backend.clientmanage.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.backend.clientmanage.create');
    }

    public function clientDataTable(Request $request)
    {
        return $this->clientService->clientDataTable($request);
    }

    public function store(ClientStoreRequest $request)
    {

        $clientData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'client_type' => $request->client_type,
            'client_code' => $request->client_code,
            'contact_person' => $request->contact_person,
            'project_code' => $request->project_code,
            'site_location' => $request->site_location,
            'city' => $request->city,
            'building_area' => $request->building_area,
            'storeys' => $request->storeys,
            'construction_type' => $request->construction_type,
            'job_scope' => $request->job_scope,
            'job_package' => $request->job_package,
        ];
        $this->clientService->create($clientData);
        return redirect()->route('clientmanage.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
