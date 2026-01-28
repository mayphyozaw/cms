<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
       
        $project_categories = ProjectCategory::all();
       
        return view('admin.backend.projectmanage.projectcategory.index', compact('project_categories'));
    }
}
