<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\DrawingTypes;
use App\Models\Project;
use Illuminate\Http\Request;

class DrawingTypeController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $drawing_types = DrawingTypes::all();
        return view('admin.backend.projectmanage.projects.drawing-type.index',compact('drawing_types','project'));
    }

    public function create()
    {
        return view('admin.backend.projectmanage.projects.drawing-type.create');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
        ]);
        
        DrawingTypes::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('projectmanage.drawing-type.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $drawing_type = DrawingTypes::findOrFail($id);
        return view('admin.backend.projectmanage.projects.drawing-type.edit',compact('drawing_type'));
    }

    public function update(Request $request, $id)
    {
        
        $drawing_type = DrawingTypes::findOrFail($id);
        $drawing_type->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('projectmanage.drawing-type.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy($id)
    {
        $drawing_type = DrawingTypes::findOrFail($id);
        $drawing_type->delete();

        return redirect()
            ->route('projectmanage.drawing-type.index')
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
