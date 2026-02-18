<?php

namespace App\Http\Controllers\Backend\EngineerManage;

use App\Http\Controllers\Controller;
use App\Http\Requests\EngineerAssign\EngineerAssignStoreRequest;
use App\Models\Client;
use App\Models\EngineerAssign;
use App\Models\Project;
use App\Models\User;
use App\Services\EngineerService;
use Illuminate\Http\Request;

class EngineersController extends Controller
{
    protected $engineerService;

    public function __construct(EngineerService $engineerService)
    {
        $this->engineerService = $engineerService;
    }

    public function index()
    {
        
        $engineers = User::where('department', 'Engineer')
            ->with(['engineerAssigns.project.client'])
            ->get();
        $assigns = EngineerAssign::with(['project'])->get();
        return view('admin.backend.engineers.index', compact('assigns', 'engineers'));
    }

    public function create(Request $request)
    {
        $engineer = User::where('department', 'Engineer')->get();
        $projects = Project::all();
        $clients = Client::all();
        return view('admin.backend.engineers.add', compact('engineer', 'projects', 'clients'));
    }



    // public function assignProject(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'project_id' => 'required|exists:projects,id',
    //     ]);

    //     $user = User::find($request->user_id);

    //     $user->projects()->syncWithoutDetaching($request->project_id);

    //     return back()->with('success', 'Project Assigned Successfully');
    // }

    public function assignForm($id)
    {
        $projects = Project::all();
        $engineer = User::find($id);
        return view('admin.backend.engineers.add', compact('engineer', 'projects'));
    }

    public function store(Request $request)
    {
        $engineerAssignData = new EngineerAssign();

        $engineerAssignData->user_id = $request->user_id;
        $engineerAssignData->project_id = $request->project_id;


        $engineerAssignData->save();
        return redirect()->route('engineers.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
