<?php

namespace App\Http\Controllers\Backend\EngineerRequest;

use App\Http\Controllers\Controller;
use App\Models\EngineerRequest;
use App\Services\EngineerRequestService;
use App\Services\EngineerService;
use Illuminate\Http\Request;

class EngineerRequestController extends Controller
{
    protected $engineerRequestService;

    public function __construct(EngineerRequestService $engineerRequestService)
    {
        $this->engineerRequestService = $engineerRequestService;
    }

    public function index()
    {
        $engineer_request_data = EngineerRequest::orderBy('id', 'desc')->get();
        return view('admin.backend.engineer-requests.index',compact('engineer_request_data'));
    }

    public function create()
    {
        return view('admin.backend.engineer-requests.create');
    }
}
