<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectFile;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    // protected $projectService;

    // public function __construct(ProjectService $projectService)
    // {
    //     $this->projectService = $projectService;
    // }

    public function index()
    {
        $project_categories = ProjectCategory::all();
        $projects = Project::with(['client', 'project_files', 'project_file'])->get();
        return view('admin.backend.projectmanage.projects.index', compact('projects', 'project_categories'));
    }

    public function load_projects()
    {
        $project_categories = ProjectCategory::all();
        $projects = Project::with(['client', 'project_files'])->get();

        $html = view('admin.backend.projectmanage.projects._tbody', [
            'projects' => $projects,
            'project_categories' => $project_categories,
        ])->render();

        return response()->json([
            'status' => true,
            'html' => $html
        ]);
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
            'project_code' => $request->project_code,
            'project_type' => $request->project_type,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('projectmanage.projects.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }



    public function getClient(Request $request)
    {
        $project = Client::find($request->client_id);

        if (!$project) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json($project);
    }

    public function getProject(Request $request)
    {
        $project = Client::find($request->project_id);

        if (!$project) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json($project);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $clients = Client::select('id', 'client_code', 'name')->get();
        return view('admin.backend.projectmanage.projects.edit', compact('project', 'clients'));
    }

    public function update(ProjectUpdateRequest $request, $id)
    {

        $project = Project::findOrFail($id);
        $project->update([
            'client_id' => $request->client_id,
            'project_code' => $request->project_code,
            'project_type' => $request->project_type,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'project_code' => $request->project_code,
        ]);

        return redirect()
            ->route('projectmanage.projects.index')
            ->with('success', 'Project updated successfully');
    }



    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        

        // if ($item->file_exists(public_path('upload/project_files/' . $item->files))) {
        //     Storage::delete(public_path('upload/project_files/' . $item->files));
        // }
        if ($project->files && Storage::disk('public')->exists('upload/project_files/' . $project->files)) {
            Storage::disk('public')->delete('upload/project_files/' . $project->files);
        }


        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully!'
        ], 200);
    }

    
}
