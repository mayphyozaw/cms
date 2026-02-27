<?php

namespace App\Http\Controllers\Backend\EngineerAssetsRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\EngineerRequest\FixedAssetRequestStoreRequest;
use App\Models\EngineerAssign;
use App\Models\FixedAsset;
use App\Models\Project;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class FixedAssetRequestsController extends Controller
{
    public function index()
    {
        return view('admin.backend.engineer-requests.fixed-asset-request.index');
    }

    public function create(Request $request)
    {
        // foreach ($request->asset_id as $index => $assetId) {
        //     FixedAsset::create([
        //         'asset_id' => $assetId,
        //         'quantity' => $request->quantity[$index],
        //         'require_date' => $request->require_date[$index],
        //         'remark' => $request->remark[$index],
        //     ]);
        // }
        $assignProject = EngineerAssign::with('user', 'project.client');
        $projects = Project::with('client')->get();
        $fixedAssets = FixedAsset::all();
        $workscopes = WorkScope::all();
        return view('admin.backend.engineer-requests.fixed-asset-request.create', compact('assignProject', 'projects', 'fixedAssets', 'workscopes'));
    }


    public function store(FixedAssetRequestStoreRequest $request)
    {

    }

    
}
