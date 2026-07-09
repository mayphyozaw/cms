<?php

namespace App\Http\Controllers\Backend\ClientManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Models\Client;
use App\Models\Project;
use App\Services\ClientService;
use App\Services\ResponseService;
use Exception;
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
        
        $lastClient = Client::latest('id')->first();
        $nextClientId = $lastClient ? $lastClient->id + 1 : 1;

        $clientCode = 'CL -' . str_pad($nextClientId, 4, '0', STR_PAD_LEFT);


        $lastProject = Project::latest('id')->first();
        $nextProjectId = $lastProject ? $lastProject->id + 1 : 1;
        $projectCode = 'P - ' . str_pad($nextProjectId, 4, '0', STR_PAD_LEFT);


        $length = $request->length ?? 0;
        $width  = $request->width ?? 0;
        $storeys  = $request->storeys ?? 0;
        $buildingArea = $length * $width;
        $totalArea = $length * $width * $storeys;

        $clientData = [
            'name' => $request->name,
            'email' => $request->email ?? '',
            'phone' => $request->phone,
            'address' => $request->address,
            'client_code' => $clientCode,
            'contact_person' => $request->contact_person,
            'project_code' => $projectCode,
            'site_location' => $request->site_location,
            'city' => $request->city,
            'length' => $request->length,
            'width' => $request->width,
            'building_area' => $buildingArea,
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

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.backend.clientmanage.edit', compact('client'));
    }

    

    public function update(ClientUpdateRequest $request, $id)
    {
        
        $clientData = Client::findOrFail($id);
        $buildingArea = 0;

        
        $buildingArea = $request->length * $request->width;
        $totalArea = $request->length * $request->width * $request->storeys;

        $clientData = [
            'name' => $request->name,
            'email' => $request->email ?? '',
            'phone' => $request->phone,
            'address' => $request->address,
            'contact_person' => $request->contact_person,
            'site_location' => $request->site_location,
            'city' => $request->city,
            'length' => $request->length,
            'width' => $request->width,
            'building_area' => $buildingArea,
            'storeys' => $request->storeys,
            'construction_type' => $request->construction_type,
            'job_scope' => $request->job_scope,
            'job_package' => $request->job_package,
        ];
        $this->clientService->update($id, $clientData);
        return redirect()->route('clientmanage.client.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function destroy($id)
    {
        try {
            $this->clientService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
}
