<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    public function index()
    {
    return view('admin.backend.projectmanage.projects.work-types.index');
    }
}
