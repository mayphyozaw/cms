<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SiteMeasurementDetails;
use App\Models\SiteMeasurements;
use Illuminate\Http\Request;

class SiteMeasurementDetailController extends Controller
{
    public function index(Project $project, SiteMeasurements $siteMeasurement)
    {

        $project->load('client');

        $siteMeasurement->load('siteMeasurementDetails');


        return view('admin.backend.projectmanage.projects.site-measurement-detail.index',
            compact('project', 'siteMeasurement')
        );
    }

    public function create(Project $project, SiteMeasurements $siteMeasurement)
    {
        $project->load('client');
        $siteMeasurementDetails = SiteMeasurementDetails::with('siteMeasurement')->get();
        $measurement = SiteMeasurements::with(['drawing.drawingType', 'category'])->get();
        $drawings = Drawings::all();
        $drawing_types = DrawingTypes::all();
        $categories = MeasurementCategories::all();
        return view('admin.backend.projectmanage.projects.drawing-measurement-detail.create',
            compact('project', 'drawingMeasurement', 'details', 'drawings', 'drawing_types', 'categories', 'measurement')
        );
    }
}
