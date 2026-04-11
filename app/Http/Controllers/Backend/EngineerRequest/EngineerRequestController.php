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
use App\Models\VariableAsset;
use App\Models\Warehouse;
use App\Models\WorkScope;
use App\Services\EngineerRequestService;
use App\Services\EngineerService;
use Illuminate\Http\Request;

class EngineerRequestController extends Controller
{



    public function index()
    {

        $engineerAssetRequests = EngineerAssetRequests::with([
            'engineerAssetRequestItems.asset.fixedAsset',
            'engineerAssetRequestItems.asset.variableAsset',
            'engineerAssetRequestItems.warehouse',
            'engineerAssetRequestItems.project',
        ])->get();

        $user = User::with('engineerAssetRequests.project.client')->get();
        // $fixedCount = Asset::with('engineerAssetRequests.engineerAssetRequestItems')->where('asset_type', 'fixedAsset')->count();
        $fixedCount = EngineerAssetRequests::where('request_type', 'fixedAsset')->count();
        // $variableCount = Asset::where('asset_type', 'variableAsset')->count();
        return view('admin.backend.engineer-requests.index', compact('user', 'engineerAssetRequests', 'fixedCount'));
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
            'request_type' => $request->request_type,

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


        return redirect()->route('engineer-requests.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function approvalStore(Request $request)
    {
        $data = EngineerAssetRequests::find($request->asset_request_id);

        if (!$data) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $data->status = $request->status_value;
        $data->remark = $request->remark;
        $data->save();

        return response()->json([
            'message' => 'Status updated successfully',
            'status' => $data->status,
            'id' => $data->id
        ]);
    }


    public function passQty(Request $request)
    {
        $engineerAssetRequestItems = EngineerAssetRequestItems::all();
        $passQty = EngineerAssetRequests::with([
            'engineerAssetRequestItems.asset.fixedAsset'
        ])->get();
        $html = view('admin.backend.engineer-requests.index', [
            'passQty' => $passQty,
            'engineerAssetRequestItems' => $engineerAssetRequestItems,
        ])->render();

        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }


    public function fixedAssestsRequestIndex()
    {
        $engineerAssetRequests = EngineerAssetRequests::with([
            'engineerAssetRequestItems.asset.fixedAsset'
        ])->get();

        $user = User::with('engineerAssetRequests.project.client')->get();
        // $assignProject = EngineerAssetRequests::with('user', 'project.client','asset')->get();
        // $projects = Project::with('client')->get();
        // $assets = Asset::all();
        // $fixedAssets = FixedAsset::all();
        return view('admin.backend.engineer-requests.fixed-asset-request.index', compact('user', 'engineerAssetRequests'));
    }

    public function fixedAssestsRequestCreate()
    {
        $assignProject = EngineerAssign::with('user', 'project.client');
        $projects = Project::with('client')->get();
        $fixedAssets = FixedAsset::all();
        $workscopes = WorkScope::all();
        return view('admin.backend.engineer-requests.fixed-asset-request.create', compact('assignProject', 'projects', 'fixedAssets', 'workscopes'));
    }

    public function variableAssestsRequestIndex()
    {
        $engineerAssetRequests = EngineerAssetRequests::with([
            'engineerAssetRequestItems.asset.variableAsset'
        ])->get();
        $user = User::with('engineerAssetRequests.project.client')->get();
        return view('admin.backend.engineer-requests.variable-asset-request.index', compact('engineerAssetRequests', 'user'));
    }

    public function variableAssestsRequestCreate()
    {
        $assignProject = EngineerAssign::with('user', 'project.client');
        $projects = Project::with('client')->get();
        $variableAssets = VariableAsset::all();
        $workscopes = WorkScope::all();
        return view('admin.backend.engineer-requests.variable-asset-request.create', compact('assignProject', 'projects', 'variableAssets', 'workscopes'));
    }
}
