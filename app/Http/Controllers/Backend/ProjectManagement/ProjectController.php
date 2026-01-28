<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectFile;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $project_categories = ProjectCategory::all();
        $project_files = ProjectFile::all();
        $projects = Project::with(['client'])->get();
        return view('admin.backend.projectmanage.projects.index', compact('projects','clients', 'project_categories', 'project_files'));
    }

    public function create()
    {
        $clients = Client::all();
        $project_categories = ProjectCategory::all();
        $project_files = ProjectFile::all();

        return view('admin.backend.projectmanage.projects.create', compact('clients', 'project_categories', 'project_files'));
    }

    public function store(ProjectStoreRequest $request)
    {
        Project::create([
            'client_id' => $request->client_id,
            'project_type' => $request->project_type,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('projectmanage.project.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }



    public function getClient(Request $request)
    {
        $client = Client::find($request->client_id);

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json($client);
    }
}
