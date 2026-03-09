<?php

namespace App\Http\Controllers\Backend\EngineerRequest;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\EngineerAssetRequestItems;
use App\Models\EngineerAssetRequests;
use App\Models\EngineerAssign;
use App\Models\EngineerRequest;
use App\Models\EngineerRequestItem;
use App\Models\FixedAsset;
use App\Models\Project;
use App\Models\User;
use App\Models\WorkScope;
use App\Services\EngineerRequestService;
use App\Services\EngineerService;
use Illuminate\Http\Request;

class EngineerRequestController extends Controller
{
    // protected $engineerRequestService;

    // public function __construct(EngineerRequestService $engineerRequestService)
    // {
    //     $this->engineerRequestService = $engineerRequestService;
    // }

    public function index()
    {
        $engineerAssetRequests = EngineerAssetRequests::with([
            'engineerAssetRequestItems.asset.fixedAsset'
        ])->get();

        $user = User::with('engineerAssetRequests.project.client')->get();
        // $assignProject = EngineerAssetRequests::with('user', 'project.client','asset')->get();
        // $projects = Project::with('client')->get();
        // $assets = Asset::all();
        // $fixedAssets = FixedAsset::all();
        return view('admin.backend.engineer-requests.index', compact('user', 'engineerAssetRequests'));
    }

    public function create(Request $request)
    {

        $assignProject = EngineerAssign::with('user', 'project.client');
        $projects = Project::with('client')->get();
        $fixedAssets = FixedAsset::all();
        $workscopes = WorkScope::all();
        return view('admin.backend.engineer-requests.create', compact('assignProject', 'projects', 'fixedAssets', 'workscopes'));
    }


    public function store(Request $request)
    {

        $lastRequest = EngineerAssetRequests::latest()->first();
        $nextNumber = $lastRequest ? $lastRequest->id + 1 : 1;

        $requestCode = 'FR-' . date('Ymd') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        $engineerAssetRequest = EngineerAssetRequests::create([

            'request_code' => $requestCode,
            'request_date' => now(),
            'project_id' => $request->project_id,
            'workscope_id' => $request->workscope_id,
            'user_id' => auth()->id(),
        ]);

        if ($request->asset_id) {
            foreach ($request->asset_id as $index => $assetId) {
                if (empty($assetId)) continue;
                $engineerAssetRequestItems = EngineerAssetRequestItems::create([
                    'asset_request_id' => $engineerAssetRequest->id,
                    'asset_id' => $assetId,
                    'quantity' => $request->quantity[$index] ?? 1,
                    'require_date' => $request->require_date[$index] ?? null,
                    'remark' => $request->remark[$index] ?? null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Request Created Successfully');
    }
}
