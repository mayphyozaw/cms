<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\MeasurementTypes;
use App\Models\Project;
use App\Models\WorkType;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    
    public function index(Project $project)
    {
        $project->load('client');
        
        $workTypes = WorkType::with('measurementType')->get();
        $measurement_types = MeasurementTypes::all();
        return view('admin.backend.projectmanage.projects.work-types.index', compact('project', 'workTypes', 'measurement_types'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $measurement_types = MeasurementTypes::all();
        return view('admin.backend.projectmanage.projects.work-types.create',compact('project','measurement_types'));
    }

    public function store(Request $request, Project $project)
    {
        
        $request->validate([
            'name' => 'required',
            'unit' => 'required',
            'measurement_type_id' => 'required',
        ]);
        
        $worktype = WorkType::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'measurement_type_id' => $request->measurement_type_id,
        ]);

        // return $worktype;

        return redirect()
            ->route('projectmanage.projects.work-types.index', $project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        $project->load('client');
        $workType = WorkType::findOrFail($id);
        $measurementTypes = MeasurementTypes::all();
        return view('admin.backend.projectmanage.projects.work-types.edit',compact('project','workType','measurementTypes'));
    }

    public function update(Request $request, Project $project, $id)
    {
        $workType = WorkType::findOrFail($id);
        $workType->update([
            'name' => $request->name,
            'unit' => $request->unit,
            'measurement_type_id' => $request->measurement_type_id,
        ]);

        return redirect()
            ->route('projectmanage.projects.work-types.index',$project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $workType = WorkType::findOrFail($id);
        $workType->delete();

        return redirect()
            ->route('projectmanage.projects.work-types.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
