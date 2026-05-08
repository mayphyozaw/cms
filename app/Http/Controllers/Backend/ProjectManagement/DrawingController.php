<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Drawings;
use App\Models\DrawingTypes;
use App\Models\Project;
use Illuminate\Http\Request;

class DrawingController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        // $drawings = Drawings::with('drawingType')->where('project_id', $project->id)->get(); 
        $drawings = $project->drawings()
        ->with('drawingType')
        ->get();
        $drawing_types = DrawingTypes::all();
        return view('admin.backend.projectmanage.projects.drawings.index', compact('project', 'drawings','drawing_types'));
    }

    public function create(Project $project)
    {
        // $clients = Client::all();
        $project->load('client');
        $drawing_types = DrawingTypes::all();
        return view('admin.backend.projectmanage.projects.drawings.create', compact('project', 'drawing_types'));
    }
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'drawing_name' => 'required',
            'drawing_type_id' => 'required',
            'revision_no' => 'required',
            'scale_ratio' => 'required',

        ]);
        $drawing_upload_file_name = null;
        if ($request->hasFile('drawing_file')) {
            $drawing_upload_file = $request->file('drawing_file');
            $drawing_upload_file_name = $drawing_upload_file->getClientOriginalName();
            $drawing_upload_file->move(public_path('/upload/drawings'), $drawing_upload_file_name);
        }
        
       $drawings = Drawings::create([
            'project_id' => $project->id,
            'drawing_type_id' => $request->drawing_type_id,
            'drawing_name' => $request->drawing_name,
            'drawing_type' => $request->drawing_type,
            'revision_no' => $request->revision_no,
            'scale_ratio' => $request->scale_ratio,
            'drawing_file' => $drawing_upload_file_name,
        ]);

        
        return redirect()
            ->route('projectmanage.projects.drawings.index',$project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }
}
