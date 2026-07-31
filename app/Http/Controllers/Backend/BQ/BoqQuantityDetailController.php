<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Exports\BoqQuantityDetailExport;
use App\Http\Controllers\Controller;
use App\Models\Boq;
use App\Models\BoqDetails;
use App\Models\BoqQuantityDetails;
use App\Models\BoqWorkCategories;
use App\Models\Client;
use App\Models\DrawingMeasurement;
use App\Models\MeasurementCategories;
use App\Models\Project;
use App\Models\WorkScope;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BoqQuantityDetailController extends Controller
{

    public function index($projectId, $boqId)
    {
        $project = Project::findOrFail($projectId);

        $boq = Boq::findOrFail($boqId);

        $boqQtyDetails = BoqQuantityDetails::where(
            'boq_id',
            $boqId
        )->get();

        return view('admin.backend.bq.bq-qty-detail.index',
            compact(
                'project',
                'boq',
                'boqQtyDetails'
            )
        );
    }
    public function create(Project $project, Boq $boq)
    {
        $project->load('client');
        $drawingMeasurements = DrawingMeasurement::with('category')->get();
        $boqDetails = BoqQuantityDetails::with([
            'drawingMeasurement.category',
            'workScope',
            'boqWorkCategory',
        ])->get();
        $workScopes = WorkScope::all();
        $clients = Client::all();
        $boqCategories = BoqWorkCategories::all();

        return view('admin.backend.bq.bq-qty-detail.create', compact('project', 'boq', 'boqDetails', 'workScopes', 'boqCategories', 'drawingMeasurements', 'clients'));
    }

    public function store(Request $request, Project $project, Boq $boq)
    {

        $sectionId = null;

        foreach ($request->rows as $row) {

            if ($row['type'] == 'section') {


                $section = BoqQuantityDetails::create([
                    'boq_id' => $boq->id,
                    'type' => 'section',
                    'item_no' => $row['item_no'],
                    'title' => $row['title'],
                    'remark' => $request->remark,
                ]);


                $sectionId = $section->id;
            } else {

                $measurement = DrawingMeasurement::find(
                    $row['drawing_measurement_id']
                );

                BoqQuantityDetails::create([
                    'boq_id' => $boq->id,
                    'section_id' => $sectionId,
                    'type' => 'item',
                    'item_no' => $row['item_no'],
                    'title' => $measurement?->category?->category_name,
                    'drawing_measurement_id' => $row['drawing_measurement_id'],
                    'unit' => $row['unit'] ?? '',
                    'quantity' => $row['quantity'] ?? '',
                    'remark' => $row['remark'] ?? '',
                ]);
            }
        }
        return redirect()->route('projectmanage.projects.boq-quantity-detail.index', [$project->id, $boq->id])->with([
            'message' => 'BOQ Cost Created successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function export(Project $project, Boq $boq)
    {

        $boq->load([
            'project.client',
            'boqQuantityDetails'
        ]);
        return Excel::download(
            new BoqQuantityDetailExport($boq),
            'BOQ_Quantity_Detail.xlsx'
        );
    }

    public function exportPdf(Project $project, Boq $boq)
    {
        $boq->load([
            'project.client',
            'boqQuantityDetails'
        ]);
        
        $boqData = Boq::with([
            'sections.items',
            'project.client',
            'boqQuantityDetails'
        ])->findOrFail($boq->id);

        $pdf = Pdf::loadView(
            'admin.backend.bq.bq-qty-detail.bq_qty_pdf',
            compact('boq', 'boqData')
        );

        return $pdf->stream('BOQ.pdf');
    }

    public function getDrawingMeasurementDetail(Request $request)
    {
        $measurement = DrawingMeasurement::findOrFail(
            $request->drawing_measurement_id
        );

        return response()->json([
            'unit'     => $measurement->unit,
            'quantity' => $measurement->quantity,
        ]);
    }

    
}
