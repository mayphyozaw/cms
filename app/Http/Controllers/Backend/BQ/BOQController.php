<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Models\Boq;
use App\Models\BoqCategories;
use App\Models\BoqWorkCategories;
use App\Models\DrawingMeasurement;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class BoqController extends Controller
{
    public function index(Project $project)
    {
        $project->load('client');
        $boqs = Boq::all();
        return view('admin.backend.bq.boq.index', compact('project', 'boqs'));
    }

    public function create(Project $project)
    {
        $project->load('client');
        $users = User::all();
        return view('admin.backend.bq.boq.create', compact('project', 'users'));
    }

    public function store(Request $request, Project $project)
    {

        $material_total = 0;
        $labor_total = 0;
        $equipment_total = 0;
        $lastBoq = Boq::latest('id')->first();
        $nextId = $lastBoq ? $lastBoq->id + 1 : 1;
        $boqCode = 'BQ -' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        $boq = Boq::create([
            'boq_no' => $boqCode,
            'project_id' => $request->project_id,
            'boq_date' => $request->boq_date,
            'material_total' => 0,
            'labor_total' => 0,
            'equipment_total' => 0,
            'grand_total' => 0,
            'revision_no' => $request->revision_no ?? 0,
            'prepared_by' => $request->prepared_by,
            'prepared_date' => $request->prepared_date,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);




        return redirect()
            ->route('projectmanage.projects.boq.index', [$project->id])
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function approved(Project $project, Boq $boq)
    {
        $project->load('client');
        $boq->load([
            'preparedBy',
            'approvedBy',
        ]);

        $users = User::all();


        return view('admin.backend.bq.boq.approve', compact('project', 'boq', 'users'));
    }

    public function approvedStore(Request $request, Project $project, Boq $boq)
    {

        // $boq = Boq::findOrFail($boq);

        $boq->update([
            'approved_by'   => $request->approved_by,
            'approved_date' => $request->approved_date,
            'status'        => $request->status,
            'remarks'       => $request->remarks,
        ]);

        // return $boq;

        return redirect()
            ->route('projectmanage.projects.boq.index', [$project->id])
            ->with([
                'message' => 'Successfully approved',
                'alert-type' => 'success'
            ]);
    }


    public function getBoqCategory(Request $request)
    {


        $boqCategories = BoqWorkCategories::where(
            'work_scope_id',
            $request->work_scope_id
        )->get();

        return response()->json($boqCategories);
    }

    public function getDrawingMeasurement(Request $request)
    {
        $measurements = DrawingMeasurement::where(
            'measurement_categories_id',
            $request->measurement_category_id
        )->get();

        return response()->json($measurements);
    }
}
