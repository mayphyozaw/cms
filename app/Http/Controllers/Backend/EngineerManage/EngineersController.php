<?php

namespace App\Http\Controllers\Backend\EngineerManage;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\EngineerAssign;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class EngineersController extends Controller
{
    
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
