<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\MeasurementCategories;
use App\Models\Project;
use Illuminate\Http\Request;

class MeasurementCategoriesController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $categories = MeasurementCategories::all();
        return view('admin.backend.projectmanage.projects.measurement-categories.index',compact('project','categories'));

    }

    public function create(Project $project)
    {
        $project->load('client');
        return view('admin.backend.projectmanage.projects.measurement-categories.create',compact('project'));
    }
    public function store(Request $request, Project $project)
    {
        
        
        $request->validate([
            'category_name' => 'required',
            'formula_types' => 'required',
            'symbol' => 'required',
            'formulas' => 'required',
            'unit' => 'required',
        ]);
        
        $measuremt_categories = MeasurementCategories::create([
            'category_name' => $request->category_name,
            'formula_types' => $request->formula_types,
            'symbol' => $request->symbol,
            'formulas' => $request->formulas,
            'unit' => $request->unit,
        ]);

        

        return redirect()
            ->route('projectmanage.projects.measurement-categories.index',$project->id)
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit(Project $project, $id)
    {
        $project->load('client');
        $category = MeasurementCategories::findOrFail($id);
        return view('admin.backend.projectmanage.projects.measurement-categories.edit',compact('project','category'));
    }

    public function update(Request $request, Project $project, $id)
    {
        
        $category = MeasurementCategories::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'formula_types' => $request->formula_types,
            'symbol' => $request->symbol,
            'formulas' => $request->formulas,
            'unit' => $request->unit,
        ]);

        return redirect()
            ->route('projectmanage.projects.measurement-categories.index',$project->id)
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy(Project $project, $id)
    {
        $category = MeasurementCategories::findOrFail($id);
        $category->delete();

        return redirect()
            ->route('projectmanage.projects.measurement-categories.index', $project->id)
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
