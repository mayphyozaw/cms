<?php

namespace App\Http\Controllers\Backend\AssetRequestApproval;

use App\Http\Controllers\Controller;
use App\Models\AssetRequestItemApproval;
use Illuminate\Http\Request;


class AssetRequestApprovalController extends Controller
{
    public function store(Request $request)
    {
        AssetRequestItemApproval::updateOrCreate(
            [
                'asset_request_id' => $request->asset_request_id
            ],
            [
                'status' => $request->status_value,
                'remark' => $request->remark,
                'approved_by' => auth()->id(),
                'approved_at' => now(),
            ]
        );

        return response()->json([
            'message' => "Request status updated successfully"
        ]);
    }
}
