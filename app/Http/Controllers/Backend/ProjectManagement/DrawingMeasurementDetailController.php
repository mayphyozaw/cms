<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\DrawingMeasurement;
use App\Models\DrawingMeasurementDetail;
use App\Models\Drawings;
use App\Models\DrawingTypes;
use App\Models\Project;
use Illuminate\Http\Request;

class DrawingMeasurementDetailController extends Controller
{
    
    public function index(Project $project, DrawingMeasurement $measurement)
    {
        $project->load('client');
        
        $details = DrawingMeasurementDetail::with('drawingMeasurement')->get();
        
        return view('admin.backend.projectmanage.projects.drawing-measurement-detail.index', compact('project','measurement', 'details'));

    }

    
}
